@extends('admin.master')

@section('title')
    Ds Index
@endsection

@section('body')
    <style>
        .ds_header{
            color: #4ea1c1;
            text-decoration: underline;
            font-size: 16px;
        }
    </style>
    <h4 class="text-center text-success">{{ session('message') }}</h4>




    <!-- Table Start -->
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0 mt-4">
            <h1 class="h4">Winter Log Detail</h1>
        </div>
    </div>

    <!-- Datase Info -->


    <!-- Datase Info -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table">

                        <tbody>
                        <tr>
                            <th scope="row">Client Name</th>
                            <td>{{$ds->location->name}}</td>
                            <th scope="row">Client Location</th>
                            <td>{{$ds->location->location}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Clock In</th>
                            <td>{{ \Carbon\Carbon::parse($ds['clockIn'])->format('d/m/Y h:i:s A')}}</td>
                            <th scope="row">Clok Out</th>
                            <td>{{ \Carbon\Carbon::parse($ds['clockOUt'])->format('d/m/Y h:i:s A')}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ammount of Material</th>
                            <td>{{$ds->amountOfMaterial}} {{$ds->materialUnit}}</td>
                            <th scope="row">Date</th>
                            <td>{{ \Carbon\Carbon::parse($ds['created_at'])->format('d/m/Y')}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Comment</th>
                            <td>{{$ds->comment}}</td>
                            <th scope="row">Comment Unusual</th>
                            <td>{{$ds->commentUnusual}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>

                    <h4 class="ds_header">Type of Material Used</h4>
                    <table class="table table table-sm">

                        <tbody>
                        <tr>
                            <th scope="row">Salt</th>
                            <td><input type="checkbox" {{$ds->materials->salt==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Grit/Sand</th>
                            <td><input type="checkbox" {{$ds->materials->grit_sand==1?"checked":""}} readonly/></td>
                        </tr>
                        <tr>
                            <th scope="row">Melter</th>
                            <td><input type="checkbox" {{$ds->materials->melter==1?"checked":""}} readonly/></td>
                        </tr>
                        </tbody>
                    </table>


                    <h4 class="ds_header">Service Performed : Lot</h4>
                    <table class="table table">

                        <tbody>
                        <tr>
                            <th scope="row">Plow</th>
                            <td><input type="checkbox" {{$ds->lots->plow==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Salt</th>
                            <td><input type="checkbox" {{$ds->lots->salt==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Shovel</th>
                            <td><input type="checkbox" {{$ds->lots->shovel==1?"checked":""}}/></td>
                        </tr>
                        </tbody>
                    </table>

                    <h4 class="ds_header">Service Performed : City/Walk</h4>
                    <table class="table table">

                        <tbody>
                        <tr>
                            <th scope="row">Plow</th>
                            <td><input type="checkbox" {{$ds->cityWalk->plow==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Salt</th>
                            <td><input type="checkbox" {{$ds->cityWalk->salt==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Shovel</th>
                            <td><input type="checkbox" {{$ds->cityWalk->shovel==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Melter</th>
                            <td><input type="checkbox" {{$ds->cityWalk->melter==1?"checked":""}}/></td>
                        </tr>
                        </tbody>
                    </table>

                    <h4 class="ds_header">Service Performed : Internal Walks</h4>
                    <table class="table table">

                        <tbody>
                        <tr>
                            <th scope="row">Plow</th>
                            <td><input type="checkbox" {{$ds->internalWalk->plow==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Salt</th>
                            <td><input type="checkbox" {{$ds->internalWalk->salt==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Shovel</th>
                            <td><input type="checkbox" {{$ds->internalWalk->shovel==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Melter</th>
                            <td><input type="checkbox" {{$ds->internalWalk->melter==1?"checked":""}}/></td>
                        </tr>
                        </tbody>
                    </table>

                    <h4 class="ds_header">Service Performed : Pavement Condition</h4>
                    <table class="table table">

                        <tbody>
                        <tr>
                            <th scope="row">Clear</th>
                            <td><input type="checkbox" {{$ds->pavementcondition->clear==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Snow Covered</th>
                            <td><input type="checkbox" {{$ds->pavementcondition->snow_covered==1?"checked":""}}/></td>
                        </tr>
                        <tr>
                            <th scope="row">Icy</th>
                            <td><input type="checkbox" {{$ds->pavementcondition->icy==1?"checked":""}}/></td>
                        </tr>
                        </tbody>
                    </table>

                    <h4 class="ds_header">Weather Observation</h4>
                    <table class="table table">

                        <tbody>
                        <tr>
                            <th scope="row">Type</th>
                            <td>{{$ds->weatherobservation->type}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Amount</th>
                            <td>{{$ds->weatherobservation->amount}} {{$ds->weatherobservation->unit}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Temperature</th>
                            <td>{{$ds->weatherobservation->temperature}}&deg;C</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                        <tr>
                            <th>Comments : </th>
                            <td>{{$ds->comment}}</td>
                        </tr>
                        <tr>
                            <th>Comments Unusual : </th>
                            <td>{{$ds->commentUnusual}}</td>
                        </tr>
                    </table>


                </div>
                <div class="col-md-1"></div>
            </div>



        </div>
    </div>
@endsection
