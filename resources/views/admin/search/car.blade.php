@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Reservations</h5>
                    <span>Plate Id: {{$car->plate_id}} </span>
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
                        <a href="/admin/search/cars">Search</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Index</li>
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
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <img class="img" src="{{ asset('images/'.$car->image) }}" alt="Car" width="250px" height="200px" style="border-radius: 50%;">
                </div>
                <div class="col-md-3">
                    Plate: {{$car->plate_id}}<br>
                    Manufacturer: {{$car->manufacturer}}<br>
                    Model: {{$car->model}}<br>
                    Type: {{$car->type}}<br>
                    Year: {{$car->year}}<br>
                    Office: {{$car->OfficeNo}}<br>
                </div>
                <div class="col-md-3">
                    Transmission: {{$car->transmission}}<br>
                    Gas Type: {{$car->gas_type}}<br>
                    Consumption: {{$car->fuel_consumption}}<br>
                    AC: {{$car->air_conditioning}}<br>
                    Bluetooth: {{$car->bluetooth}}<br>
                    @if($car->status == 1)
                    Status: Available<br>
                    @else
                    Status: Out of Service<br>
                    @endif
                    Price: {{$car->price}}<br>
                </div>
                </div>
            </div>
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
                        <td>No Reseravtions To Display</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection