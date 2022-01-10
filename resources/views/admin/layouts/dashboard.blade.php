@extends('admin.layouts.master')

@section('content')


<div class="main-content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Customers</h6>
                                <h2>{{$no_customers}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Cars</h6>
                                <h2>{{$no_cars}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Rentals</h6>
                                <h2>{{$no_rentals}}</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <h3 class="card-title">Cars by Rentals</h3>
                                <div id="visitfromworld" style="width:100%; height:50px"></div>
                            </div>
                            @foreach($cars as $car)
                            @php($count=0)
                                @foreach($reservations as $reservation)
                                    @if($reservation->plate_id == $car->plate_id)
                                        @php($count++)
                                    @endif
                                @endforeach
                            <div class="col-md-6">
                                <div class="row mb-15">
                                    <div class="col-9">{{$car->model}} ({{$car->plate_id}}) {{$car->year}}</div>
                                    <div class="col-3 text-right">{{$count}} rentals</div>
                                    <div class="col-12">
                                        <div class="progress progress-sm mt-5">
                                            @php($ratio=$count/$no_rentals*100)
                                            @php($percent=$ratio.'%')
                                            <div class="progress-bar bg-green" role="progressbar" style="width:<?= $percent; ?>;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-12">
                                <h3 class="card-title">Cars by Profit</h3>
                                <div id="visitfromworld" style="width:100%; height:50px"></div>
                            </div>
                            @foreach($cars as $car)
                                @php($earnings=0)
                                @foreach($reservations as $reservation)
                                    @if($reservation->plate_id == $car->plate_id)
                                        @php($earnings+=$reservation->total_amount)
                                    @endif
                                @endforeach
                            <div class="col-md-6">
                                <div class="row mb-15">
                                    <div class="col-9">{{$car->model}} ({{$car->plate_id}}) {{$car->year}}</div>
                                    <div class="col-3 text-right">{{$earnings}} EGP</div>
                                    <div class="col-12">
                                        <div class="progress progress-sm mt-5">
                                            @php($ratio=$earnings/$sumOfProfit*100)
                                            @php($percent=$ratio.'%')
                                            <div class="progress-bar bg-green" role="progressbar" style="width:<?= $percent; ?>;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection