@extends('admin.master')

@section('body')

    <div class="row mt-6">
        <div class="col-12 mb-4">
            <div class="card bg-yellow-100 border-0 shadow">
                <div class="card-header d-sm-flex flex-row align-items-center flex-0">
                    <div class="d-block mb-3 mb-sm-0">
                        <h1 class="fs-3 fw-extrabold">Today</h1>
                        <h4>{{ \Carbon\Carbon::now()->format('D j, Y') }}
                            | {{ \Carbon\Carbon::now()->format('h:i A') }}</h4>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 mb-4">
            <div class="card border-0 shadow">
                <img style="height: 316px;padding: 28px;width: 240px;margin: 0 auto;" src="{{asset('assets/img/logo.png')}}">
            </div>
        </div>

        <div class="row mt-6 justify-content-between px-4">
            <div class="card" style="width: 18rem; margin: 0; padding: 15px;">
                <h5 class="card-title mt-2 mb-3">Clients</h5>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h1 class="card-text">{{$clients}}</h1>
                    <img src="{{asset('/')}}assets/img/handshake.png" alt="handshake" style="border-radius: 20%" width="120px" height="120px"/>
                </div>
            </div>
            <div class="card" style="width: 18rem; margin: 0; padding: 10px;">
                <h5 class="card-title mt-2 mb-3">Employees</h5>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h1 class="card-text">{{$employees}}</h1>
                    <img src="{{asset('/')}}assets/img/people.png" alt="handshake" style="border-radius: 20%" width="120px" height="120px"/>
                </div>
            </div>
            <div class="card" style="width: 18rem; margin: 0; padding: 10px;">
                <h5 class="card-title mt-2 mb-3">Tasks</h5>
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h1 class="card-text">{{$dailyServices}}</h1>
                    <img src="{{asset('/')}}assets/img/tasks.png" alt="handshake" style="border-radius: 20%" width="120px" height="120px"/>
                </div>
            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function updateClock() {
                $('#real-time-clock').load(location.href + ' #real-time-clock');
            }

            setInterval(updateClock, 60000); // Update every minute
        });
    </script>
@endsection
