@extends('admin.master')

@section('title')
    Another Module
@endsection

@section('body')

    <div class="py-4 col-md-12">
        <div class="dropdown">
            <a href="{{route('location.add')}}" class="btn btn-warning btn-md">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>Add Location<i class="fa fa-add"></i></a>
        </div>
    </div>

    <h4 class="text-center text-success">{{session('message')}}</h4>

    <!-- Table Start -->

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Location Information</h1>
        </div>

    </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">ID</th>
                        <th class="border-0">Field Area</th>
                        <th class="border-0">Working Area</th>
                        <th class="border-0">Address</th>
                        <th class="border-0">Area Name</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @foreach($locations as $location)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$location->field_area}}</td>
                            <td>{{$location->working_area}}</td>
                            <td>{{$location->address}}</td>
                            <td>{{$location->area_name}}</td>
                            <td>
                                <a href="{{route('location.edit', ['id' => $location->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('location.delete', ['id' => $location->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...');">Delete</a>
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

