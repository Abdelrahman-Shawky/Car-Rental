@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">

            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Complete Profile
                        <a href="{{url('home') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('completeProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror" value="{{old('fname')}}">
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{old('lname')}}">
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">SSN</label>
                                <input type="text" name="ssn" class="form-control @error('ssn') is-invalid @enderror" value="{{old('ssn')}}">
                                    @error('ssn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">License No</label>
                                <input type="text" name="license_no" class="form-control @error('license_no') is-invalid @enderror" value="{{old('license_no')}}">
                                    @error('license_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">City</label>
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{old('city')}}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Country</label>
                                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{old('country')}}">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">PhoneNumber</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Age</label>
                                <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" value="{{old('age')}}">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div>
                            <label for="">Gender</label>
                            <select class="form-control" name="gender"  value="{{old('gender')}}">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male"> Male </option>
                                <option value="Female"> Female </option>
                            </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection