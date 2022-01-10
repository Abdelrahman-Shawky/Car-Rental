@extends('admin.layouts.master')

@section('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Cars</h5>
                    <span>Filter by Car</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cars</li>
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
                <form method="POST" action="/admin/filteredSearch/cars" enctype="multipart/form-data">
                @csrf
                    <div class="col">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        Manufacturer
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
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

                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" value="submit" id="submit">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection