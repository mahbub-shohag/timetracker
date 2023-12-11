@extends('admin.master')
@section('body')


    <div class="d-flex justify-content-end px-6">
        <button class="btn btn-success d-inline-flex align-items-center me-2 mt-6 mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            <a href="{{ route('equipments.create') }}">Add Equipment</a>
        </button>
    </div>




    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">All Equipment Information</h1>
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
                        <th class="border-0">Equipment Name</th>
                        <th class="border-0">Equipment Type</th>
                        <th class="border-0">Unit Number</th>
                        <th class="border-0">Quantity</th>
                        <th class="border-0 rounded-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Item -->

                    <tr>
                        <td>1</td>
                        <td>Small Machines</td>
                        <td>Snow Removal</td>
                        <td>PL0001</td>
                        <td>20</td>
                        {{-- <td><img height="30px" width="40px" src="{{asset($user->image)}}" alt=""></td> --}}
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this...');">
                                Delete
                            </a>
                        </td>


                    </tr>

                    <!-- End of Item -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
