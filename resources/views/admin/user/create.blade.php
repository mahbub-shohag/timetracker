@extends('admin.master')
@section('title')
    Add User
@endsection

@section('body')


    <div class="row mt-3">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <h2 class="h5 mb-4">General information</h2>
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="name">Name</label>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="role">Role</label>
{{--                                <input class="form-control" name="role" id="role" type="text" placeholder="role" required>--}}

                                <select class="form-control" name="role" type="text" placeholder="role" required>
                                    <option selected>--select Role--</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" name="email" id="email" type="email" placeholder="name@company.com" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" id="password" type="password" placeholder="********" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input class="form-control" name="confirm_password" id="password" type="password" placeholder="********" required>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input class="form-control" name="phone" id="phone" type="number" placeholder="Phone Number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 mb-3">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" name="address" id="address" type="text" placeholder="Enter your home address" required>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label for="number">Age</label>
                                <input class="form-control" name="age" id="age" type="number" placeholder="Age" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-2 mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">User Profile Picture</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-info mt-2 animate-up-2" type="submit">Submit</button>
                        <a class="btn btn-success btn-md" href="{{route('user.index')}}">Back to Manage</a>
                    </div>
                </form>
            </div>


@endsection
