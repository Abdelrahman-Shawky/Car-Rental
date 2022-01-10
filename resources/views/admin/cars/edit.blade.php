@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Cars</h5>
                    <span>Edit Car</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="/admin/cars">Car</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="role justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('status'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{Session::get('status')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>{{$car->plate_id}} {{$car->manufacturer}} {{$car->model}}</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" action="/admin/cars/edit/{{$car->plate_id}}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Plate ID</label>
                                <input type="text" name="plate_id" class="form-control @error('plate_id') is-invalid @enderror"
                                    placeholder="Plate Id" value="{{$car->plate_id}}">
                                @error('plate_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Manufacturer</label>
                                <input type="text" name="manufacturer"
                                    class="form-control @error('manufacturer') is-invalid @enderror" placeholder="manufacturer"
                                    value="{{$car->manufacturer}}">
                                @error('manufacturer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Model</label>
                                <input type="text" name="model"
                                    class="form-control @error('model') is-invalid @enderror" placeholder="model" value="{{$car->model}}">
                                @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Year</label>
                                <input type="text" name="year"
                                    class="form-control @error('year') is-invalid @enderror"
                                    placeholder="year" value="{{$car->year}}">
                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Transmission</label>
                            <select class="form-control" name="transmission" value="{{$car->transmission}}">
                                <option value="" disabled selected>Please select Transmission</option>
                                <option value="Automatic"> Automatic </option>
                                <option value="Manual"> Manual </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="integer" name="price" class="form-control @error('price') is-invalid @enderror"
                                    placeholder="price" value="{{$car->price}}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Type</label>
                            <select class="form-control" name="type" value="{{$car->transmission}}">
                                <option value="" disabled selected>Please select</option>
                                @foreach($types as $type)
                                    <option value="{{$type->type}}"> {{$type->type}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Office Number</label>
                            <select class="form-control" name="officeNo" value="{{$car->transmission}}">
                                <option value="" disabled selected>Please select</option>
                                @foreach($offices as $office)
                                    <option value="{{$office->officeNo}}"> {{$office->officeNo}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gas Type</label>
                                <input type="text" name="gas_type"
                                    class="form-control @error('gas_type') is-invalid @enderror" placeholder="gas type" value="{{$car->gas_type}}">
                                @error('gas_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Fuel Consumption</label>
                                <input type="text" name="fuel_consumption"
                                    class="form-control @error('fuel_consumption') is-invalid @enderror"
                                    placeholder="fuel consumption" value="{{$car->fuel_consumption}}">
                                @error('fuel_consumption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Air Conditioning</label>
                            <select class="form-control" name="air_conditioning" value="{{$car->transmission}}">
                                <option value="" disabled selected>Please select</option>
                                <option value="1"> True </option>
                                <option value="0"> False </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Bluetooth</label>
                            <select class="form-control" name="bluetooth" value="{{$car->transmission}}">
                                <option value="" disabled selected>Please select</option>
                                <option value="1"> True </option>
                                <option value="0"> False </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file"
                                    class="form-control file-upload-info @error('image') is-invalid @enderror"
                                    placeholder="Upload Image" name="image">
                                <span class="input-group-append"></span>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <span class="input-group-append">
                                </span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">
                        Submit
                    </button>
                    <a href="{{url()->previous()}}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection