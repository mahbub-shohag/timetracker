@extends('admin.master')

@section('title')
    Ds Index
@endsection

@section('body')

    <h4 class="text-center text-success">{{session('message')}}</h4>

    <!-- Table Start -->

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Daily Winter Log</h1>
            <form action="{{route('ds.filter')}}" method="post" class="form-inline">
                @csrf
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">From</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="start_date" value="{{$start_date}}" id="" class="form-control" aria-describedby="">
                    </div>
                    <div class="col-auto">
                        <label for="inputPassword6" class="col-form-label">To</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" name="end_date" value="{{$end_date}}" id="" class="form-control" aria-describedby="">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">SL</th>
                        <th class="border-0">Employees</th>
                        <th class="border-0">Client Location</th>
                        <th class="border-0">Service</th>
                        <th class="border-0">Date</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @foreach($dsl as $ds)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <?php
                                foreach($ds->employees as $key=>$ads){
                                    if(isset($ads->employee)){
                                        echo $ads->employee->name;
                                        if($key<sizeof($ds->employees)-2) echo ",";
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                    <?php
                                    if($ds->location!=null){
                                        echo $ds->location->location;
                                    }
                                    ?>
                            </td>

                            <td><?php
                                    if($ds->service!=null){
                                        echo $ds->service->name;
                                    }
                                    ?>

                            </td>

                            <td>{{ \Carbon\Carbon::parse($ds['created_at'])->format('d/m/Y')}}</td>

                            <td>
                                <a href="{{route('ds.show', ['id' => $ds->id])}}" class="btn btn-info btn-sm">View</a>
{{--                                <a href="{{route('ds.destroy', ['id' => $ds->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?');">Delete</a>--}}
                            </td>
                        </tr>
                    @endforeach
                    <!-- End of Item -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>






@endsection


