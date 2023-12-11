@extends('admin.master')
@section('title')
    New Client
@endsection

@section('body')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <div class="row mt-3">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <h2 class="h5 mb-4">Update Client</h2>
                <form action="{{route('clients.update',['id'=>$client->id])}}" class="mt-4" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="name">Client Name</label>
                                <input class="form-control" name="name" value="{{$client->name}}" id="name" type="text" placeholder="Enter your name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input class="form-control" name="location" value="{{$client->location}}" id="location" type="text" placeholder="Location" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="location">Services</label>
                                <select class="form-control" name="service">
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}" <?php if(isset($client->clientServices) && sizeof($client->clientServices)>0 && $client->clientServices[0]->service_id==$service->id) echo "selected"; ?>>{{$service->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="location">Rate per hour</label>
                                <input type="number" <?php if(isset($client->clientServices) && sizeof($client->clientServices)>0){ ?>value="{{$client->clientServices[0]->rate}}" <?php } ?> name="rate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="location">Employee</label>
                                <select name="employees[]" id="employees" multiple>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}" <?php if(in_array($employee->id,$selectedEmployees)) {echo "selected";} ?>>{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-info mt-2 animate-up-2" type="submit">Submit</button>
{{--                        <a class="btn btn-success btn-md" href="{{route('clients.index')}}">Back</a>--}}
                    </div>
                </form>
            </div>


            <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
            <script>
                new MultiSelectTag('employees')  // id
            </script>

@endsection
