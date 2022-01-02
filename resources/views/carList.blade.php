@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        @foreach($cars as $car)
                        
                            <div class="myContainer">
                                <div class="row mb-3">
                                <div class="col">
                                <img src="{{ asset('images/'.$car->image) }}" width="250px" height="150px" alt="Image" class="myimg">
                                </div>
                                <div class="col">
                                <p>{{$car->manufacturer}}</p>
                                <p>{{$car->model}}</p>
                                <p>{{$car->year}}</p>
                                </div>


                            </div>
                        </div>

                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
