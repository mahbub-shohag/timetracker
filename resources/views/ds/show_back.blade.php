@extends('admin.master')

@section('title')
    Ds Index
@endsection

@section('body')
    <h4 class="text-center text-success">{{ session('message') }}</h4>

    <!-- Table Start -->
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0 mt-4">
            <h1 class="h4">Log Detail</h1>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 col-12">
        <div class="card-body">
            <h3>Type of Material Used</h3>
            <div class="row">
                <div class="col-6">
                    <label>Salt</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Grit/Sand</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Melter</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

        </div>
    </div>
    <div class="card border-0 shadow mb-4 col-12">
        <div class="card-body">
            <h3>Service Performed</h3>
            <h5>Lot</h5><hr>
            <div class="row">
                <div class="col-6">
                    <label>Plow</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Salt</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Shovel</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <h5>City/Walk</h5><hr>
            <div class="row">
                <div class="col-6">
                    <label>Plow</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Salt</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Shovel</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Melter</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <h5>Internal Walks</h5><hr>
            <div class="row">
                <div class="col-6">
                    <label>Plow</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Salt</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label>Shovel</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Melter</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <h5>Pavement Condition</h5><hr>
            <div class="row">
                <div class="col-6">
                    <label>Clear</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Snow Covered</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Icy</label>
                </div>
                <div class="col-6 text-right">
                    <input type="checkbox">
                </div>
            </div>
        </div>
    </div>
@endsection
