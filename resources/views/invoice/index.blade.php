@extends('admin.master')
@section('body')
    <div class="d-flex justify-content-between w-100 flex-wrap mt-4">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Invoice List</h1>
        </div>

    </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">SL</th>
                        <th class="border-0">Client Name</th>
                        <th class="border-0">Location</th>
                        <th class="border-0">Services</th>
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->
                    @foreach($invoices as $key=>$invoice)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>
                            @if(isset($invoice->location))
                                {{$invoice->location->name}}
                            @endif
                        </td>
                        <td>
                            @if(isset($invoice->location))
                                {{$invoice->location->location}}
                            @endif
                        </td>
                        <td>
                            @if(isset($invoice->service))
                                {{$invoice->service->name}}
                            @endif
                        </td>

                        <td>
                            <a href="{{route('invoice.show',['id'=>$invoice->id])}}" class="btn btn-warning btn-sm">
                                View
                            </a>
                            <a href="{{route('invoice.download',['id'=>$invoice->id])}}" class="btn btn-warning btn-sm" target="_blank">
                                Download
                            </a>
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
