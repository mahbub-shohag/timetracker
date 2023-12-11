@extends('admin.master')
@section('title')
    Change Password
@endsection

@section('body')


    <h1 class="h5 mb-4 text-center font-weight-bold">Change Password</h1>
    <div class="row mt-4 justify-content-center align-items-center">
        <div class="col-10 col-md-10 col-lg-8 col-xl-8">
            <div class="card card-body border-0 shadow mb-4">
                <form action="{{route('user.setpassword',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" readonly name="name" value="{{$user->name}}">
                            </div>
                            <div class="form-group mt-1">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" readonly type="email" value="{{$user->email}}">
                            </div>
                            <div class="form-group mt-1">
                                <label for="password">New Password</label>
                                <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                            </div>
                            <div class="form-group mt-1">
                                <label for="password">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-info mt-2 animate-up-2" type="submit">Reset</button>
                                <a class="btn btn-success btn-md" href="{{route('user.index')}}">Back to Manage</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
