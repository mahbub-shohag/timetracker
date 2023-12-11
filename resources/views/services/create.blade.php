@extends('admin.master')
@section('title')
    New Service
@endsection

@section('body')


    <div class="row mt-3">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <h2 class="h5 mb-4">New Service</h2>
                <form action="{{route('services.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="name">Service Name</label>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter service name" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-info mt-2 animate-up-2" type="submit">Submit</button>
                        <a class="btn btn-success btn-md" href="{{route('services.index')}}">Back to Manage</a>
                    </div>
                </form>
            </div>


@endsection
