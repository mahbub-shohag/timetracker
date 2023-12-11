@extends('admin.master')
@section('title')
    Add Location
@endsection

@section('body')


    <div class="row mt-3">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <h2 class="h5 mb-4">General information</h2>
                <form action="{{route('location.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="first_name">Field Area</label>
                                <input class="form-control" name="field_area" id="field_area" type="text" placeholder="Field Area" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="last_name">Working Area</label>
                                <input class="form-control" name="working_area" id="working_area" type="text" placeholder="Working Area" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 mb-3">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input class="form-control" name="address" id="address" type="text" placeholder="Address" required>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="form-group">
                                <label for="number">Area Name</label>
                                <input class="form-control" name="area_name" id="area_name" type="text" placeholder="Area Name" required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-info mt-2 animate-up-2" type="submit">Submit</button>
                        <a class="btn btn-success btn-md" href="{{route('location.index')}}">Back to Manage</a>
                    </div>
                </form>
            </div>


@endsection

