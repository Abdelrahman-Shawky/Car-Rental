@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Cars</h5>
                    <span>Filtered by Car</span>
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
                        <a href="/admin/cars">Cars</a>
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
            <div class="card-header"><h3>Data Table</h3></div>
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Plate Id</th>
                            <th class="nosort">Image</th>
                            <th>Manufacturer</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Transmission</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cars)>0)
                        @foreach($cars as $car)
                        <tr>
                            <td>{{$car->plate_id}}</td>
                            <td><img src="{{asset('images/'.$car->image)}}" class="table-user-thumb" alt=""></td>
                            <td>{{$car->manufacturer}}</td>
                            <td>{{$car->model}}</td>
                            <th>{{$car->year}}</th>
                            <th>{{$car->transmission}}</th>
                            <td>{{$car->price}}</td>
                            @if($car->status==1)
                            <td>Available</td>
                            @else
                            <td>Out of Service</td>
                            @endif
                            <td>
                                <div class="table-actions">
                                    <a href="/admin/filteredSearch/cars/{{$car->plate_id}}"><i class="ik ik-user"></i></a>
                                    <a href="/admin/search/cars/{{$car->plate_id}}"><i class="ik ik-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Cars To Display</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection