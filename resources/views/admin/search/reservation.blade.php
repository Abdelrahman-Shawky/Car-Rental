@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Reservations</h5>
                    <span>Date: {{$pickupDate}}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/admin/search/reservations">Search</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Reservations</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @if(Session::has('status'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('status')}}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Res Id</th>
                            <th>Plate Id</th>
                            <th>Cust Id</th>
                            <th>Amount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Pickup</th>
                            <th>Dropoff</th>
                            <!-- <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th> -->
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($reservations)>0)
                        @foreach($reservations as $reservation)
                        <tr>
                            <td>{{$reservation->res_id}}</td>
                            <td>{{$reservation->plate_id}}</td>
                            <td>{{$reservation->user_id}}</td>
                            <th>{{$reservation->total_amount}}</th>
                            <th>{{$reservation->start_date}}</th>
                            <td>{{$reservation->end_date}}</td>
                            <td>{{$reservation->pickup_location}}</td>
                            <td>{{$reservation->dropoff_location}}</td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Reseravtions on This Day</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection