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
                <h2 class="h5 mb-4">New Client</h2>
                <form action="{{route('clients.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div>
                                <label for="name">Client Name</label>
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input class="form-control" name="location" id="location" type="text" placeholder="Location" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="location">Services</label>
                                <select class="form-control" name="service">
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="form-group">
                                <label for="location">Rate per hour</label>
                                <input type="number" name="rate" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="location">Employee</label>
                                <select name="employees[]" id="employees" multiple>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-info mt-2 animate-up-2" type="submit">Submit</button>
                        <a class="btn btn-success btn-md" href="{{route('clients.index')}}">Back to Manage</a>
                    </div>
                </form>
            </div>


            <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
            <script>
                new MultiSelectTag('employees')  // id
            </script>

@endsection
