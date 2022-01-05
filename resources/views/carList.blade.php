@extends('layouts.app')

@section('content')


  

<div class="sidenav">
    <div>
        <form method="POST"  action="/cars/{{$pickupDate}}/{{$dropoffDate}}/{{$pickupLocation}}/{{$dropoffLocation}}" enctype="multipart/form-data">
        @csrf
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Manufacturer
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        @foreach($manufacturers as $manufacturer)
                            <label class="containercheckbox">{{$manufacturer}}
                                @php($flag=0)
                                @foreach($filteredManufacturers as $filteredManufacturer)
                                    @if($manufacturer == $filteredManufacturer)
                                        @php($flag=1)
                                    @endif
                                @endforeach
                                @if($flag==1)
                                    <input id="checkbox" type="checkbox" name="{{$manufacturer}}" checked="true">
                                @else
                                <input id="checkbox" type="checkbox" name="{{$manufacturer}}">
                                @endif
                            <span class="checkmark"></span>
                            </label>
                        @endforeach
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Model
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        @foreach($models as $model)
                            <label class="containercheckbox">{{$model}}
                                @php($flag=0)
                                @foreach($filteredModels as $filteredModel)
                                    @if($model == $filteredModel)
                                        @php($flag=1)
                                    @endif
                                @endforeach
                                @if($flag==1)
                                    <input id="checkbox" type="checkbox" name="{{$model}}" checked="true">
                                @else
                                <input id="checkbox" type="checkbox" name="{{$model}}">
                                @endif
                            <span class="checkmark"></span>
                            </label>
                        @endforeach                   
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Year
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        @foreach($years as $year)
                            <label class="containercheckbox">{{$year}}
                                @php($flag=0)
                                @foreach($filteredYears as $filteredYear)
                                    @if($year == $filteredYear)
                                        @php($flag=1)
                                    @endif
                                @endforeach
                                @if($flag==1)
                                    <input id="checkbox" type="checkbox" name="{{$year}}" checked="true">
                                @else
                                <input id="checkbox" type="checkbox" name="{{$year}}">
                                @endif
                            <span class="checkmark"></span>
                            </label>
                        @endforeach                     
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                        Type
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        @foreach($types as $type)
                            <label class="containercheckbox">{{$type}}
                                @php($flag=0)
                                @foreach($filteredTypes as $filteredType)
                                    @if($type == $filteredType)
                                        @php($flag=1)
                                    @endif
                                @endforeach
                                @if($flag==1)
                                    <input id="checkbox" type="checkbox" name="{{$type}}" checked="true">
                                @else
                                <input id="checkbox" type="checkbox" name="{{$type}}">
                                @endif
                            <span class="checkmark"></span>
                            </label>
                        @endforeach                   
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                        Transmission
                    </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                    <div class="accordion-body">
                        @foreach($transmissions as $transmission)
                            <label class="containercheckbox">{{$transmission}}
                                @php($flag=0)
                                @foreach($filteredTransmissions as $filteredTransmission)
                                    @if($transmission == $filteredTransmission)
                                        @php($flag=1)
                                    @endif
                                @endforeach
                                @if($flag==1)
                                    <input id="checkbox" type="checkbox" name="{{$transmission}}" checked="true">
                                @else
                                <input id="checkbox" type="checkbox" name="{{$transmission}}">
                                @endif
                            <span class="checkmark"></span>
                            </label>
                        @endforeach                     
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" value="submit" id="submit">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Choose Your Vehicle</h1>
                    <div>
                        @foreach($cars as $car)
                        <div class="container myContainer p-4">
                                <div class="row-md-4">
                                    <div class="col">
                                        <img src="{{ asset('images/'.$car->image) }}" width="250px" height="150px" alt="Image" class="myimg">
                                    </div>
                                    <div class="col">
                                        <p>{{$car->manufacturer}}</p>
                                        <p>{{$car->model}}</p>
                                        <p>{{$car->year}}</p>
                                    </div>
                                </div>
                            <a  href="#" data-toggle="modal" data-target="#carModal{{$car->plate_id}}">
                                <button class="btn btn-primary" type="submit" value="submit" id="submit">Reserve</button>
                            </a>
                        </div>
                        @include('reservation.modal')
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
