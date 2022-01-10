@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Reservations</h5>
                    <span>Select Date</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard"><i class="ik ik-home"></i></a>
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
            <div class="card-header">

            </div>
            <div class="card-body">
                <form method="POST" action="/admin/reports/periodicReservations" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>
                                Pickup Date
                            </label>
                            <input class="p-2" type="date" id="pickupDate" class="form-control" name="pickupDate">
                        </div>
                        <div class="col">
                            <label>
                                Dropoff Date
                            </label>
                            <input class="p-2" type="date" id="dropoffDate" class="form-control" name="dropoffDate">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection