@extends('admin.master')
@section('body')
    <h1 class="h5 mb-4 mt-6 text-center font-weight-bold text-primary">Employee Details</h1>

    <div class="row mt-4 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6 col-xl-6">
            <div class="card card-body border-0 shadow mb-4 py-5 px-5 text-center d-flex align-items-center justify-content-center">
                <img src="{{asset('assets/img/profile.png')}}" alt="Employee Photo" style="width: 140px; height: 140px; object-fit: cover; border-radius: 30%;" class="mb-4">
                <h2>{{$employee->name}}</h2>
                <p>Email: {{$employee->email}}</p>
                <p>Phone: {{$employee->phone}}</p>
            </div>
        </div>
    </div>
@endsection
