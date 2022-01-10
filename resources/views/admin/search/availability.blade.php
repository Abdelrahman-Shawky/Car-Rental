@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Availability</h5>
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
                        <a href="/admin/search/availability">Search</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Availabilities</li>
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
                            <th>Plate Id</th>
                            <th>Manufacturer</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Availability</th>
                            <!-- <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th> -->
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td>{{$car->plate_id}}</td>
                            <td>{{$car->manufacturer}}</td>
                            <th>{{$car->model}}</th>
                            <th>{{$car->year}}</th>
                            @php($available=1)
                            @foreach($reservations as $reservation)
                                @if($reservation->plate_id == $car->plate_id)
                                    @php($available=0)
                                @endif
                            @endforeach
                            @if($available==1)
                                <td>Available</td>
                            @else
                                <td>Rented</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection