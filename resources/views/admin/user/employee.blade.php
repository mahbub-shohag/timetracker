@extends('admin.master')

@section('title')
    User Module Part
@endsection

@section('body')

    <div class="py-4 col-md-12">
        <div class="dropdown">
            <a href="{{route('user.add')}}" class="btn btn-warning btn-md">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>Add User<i class="fa fa-add"></i></a>
        </div>
    </div>

    <h4 class="text-center text-success">{{session('message')}}</h4>

    <!-- Table Start -->

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">All Users Information</h1>
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
                        <th class="border-0">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Phone Number</th>
                        <th class="border-0">Address</th>
                        <th class="border-0">Age</th>
                        <th class="border-0">Image</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->first_name. " " .$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->age}}</td>
                            <td><img height="30px" width="40px" src="{{asset($user->image)}}" alt=""></td>
                            <td>
                                <a href="{{route('user.edit', ['id'=> $user->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{route('user.delete', ['id'=> $user->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...');">Delete</a>
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
