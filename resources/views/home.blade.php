@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="/cars" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input id="pickupLocation" type="text" class="form-control" name="pickupLocation" autofocus>
                            </div>
                            <div class="col">
                                <input id="dropoffLocation" type="text" class="form-control" name="dropoffLocation" autofocus>
                            </div>
                            <div class="col">
                                <input class="p-2" type="date" id="datePickUp" class="form-control" name="pickupDate">
                            </div>
                            <div class="col">
                                <input class="p-2" type="date" id="dateDropOff" class="form-control" name="dropoffDate">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
