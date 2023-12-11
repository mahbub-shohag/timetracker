@extends('admin.master')

@section('title')
    User Module Part
@endsection

@section('body')

    <div class="container-fluid">
        <div class="row py-4 px-4 d-flex align-items-center">
            <div class="col-md-6 mb-3">
                <h1 class="h4">Employee List</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="mr-4 mb-lg-0">
                    <div class="dropdown">
                        <a href="{{route('employees.create')}}" class="btn btn-success btn-md">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>Add Employee<i class="fa fa-add"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <h4 class="text-center text-success">{{session('message')}}</h4>

    <!-- Table Start -->

    <div class="d-flex justify-content-between w-100 flex-wrap">


    </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">SL</th>
                        <th class="border-0">Employee Name</th>
                        <th class="border-0">Employee Email</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>
                                <a href="{{route('employees.show',['id'=>$employee->id])}}" class="btn btn-warning btn-sm">View</a>
                                <a href="{{route('employees.edit',['id'=>$employee->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('employees.destroy',['id'=>$employee->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...');">Delete</a>
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
