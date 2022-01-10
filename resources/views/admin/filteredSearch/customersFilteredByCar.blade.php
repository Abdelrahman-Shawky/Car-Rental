@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>Customers</h5>
                    <span>Customers Filtered by Car </span>
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
                        <a href="/admin/filteredSearch/cars">Search</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Customers</li>
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
                            <th>User Id</th>
                            <th>SSN</th>
                            <th>Fname</th>
                            <th>Lname</th>
                            <th>License</th>
                            <th>Age</th>
                            <th>Country</th>
                            <!-- <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th>
                            <th class="nosort">&nbsp;</th> -->
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(count($customers)>0)
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->user_id}}</td>
                            <td>{{$customer->SSN}}</td>
                            <td>{{$customer->fname}}</td>
                            <th>{{$customer->lname}}</th>
                            <th>{{$customer->license_no}}</th>
                            <td>{{$customer->age}}</td>
                            <td>{{$customer->country}}</td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Customers To Display</td>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection