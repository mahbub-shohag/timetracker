@extends('admin.master')
@section('body')

    <div class="row mt-4 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6 col-xl-6">
            <div class="card card-body border-0 shadow mb-4">
                <h1 class="h5 mb-4 text-center">Add new Employee</h1>
                <form action="#" class="mt-4" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group mt-1">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="name@company.com" required>
                            </div>
                            <div class="form-group mt-1">
                                <label for="email">Contact Number</label>
                                <input class="form-control" id="number" name="number" type="number" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group mt-1">
                                <label for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group mt-1">
                                <label for="confirm_password">Confirm Password</label>
                                <input class="form-control" id="confirm_password" type="password" name="password_confirmation" placeholder="Confirm password" required>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success btn-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
