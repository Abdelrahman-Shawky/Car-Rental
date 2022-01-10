@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Reservations</h5>
                    <span>Date: {{$pickupDate}} -> {{$dropoffDate}}</span>
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
                        <a href="/admin/reports/periodicReservations">Search</a>
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
                            <th>Fname</th>
                            <th>Lname</th>
                            <th>Manufacturer</th>
                            <th>Model</th>
                            <th>Amount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
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
                            <td>{{$reservation->fname}}</td>
                            <td>{{$reservation->lname}}</td>
                            <th>{{$reservation->manufacturer}}</th>
                            <td>{{$reservation->model}}</td>
                            <td>{{$reservation->total_amount}}</td>
                            <th>{{$reservation->start_date}}</th>
                            <td>{{$reservation->end_date}}</td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Reseravtions in This Period</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection