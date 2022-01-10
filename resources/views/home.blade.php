@extends('layouts.app')

@section('content')

<script>
function dropdown1() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput1');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL1");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
function dropdown2() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput2');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL2");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

function fill1(input){
    document.getElementById("myInput1").value = input;
}
function fill2(input){
    document.getElementById("myInput2").value = input;
}
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Find Your Vehicle') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!is_null(Auth::user()->Customer))
                    <form method="GET" action="/cars" enctype="multipart/form-data">
                    @else
                    <form method="GET" action="/completeProfile" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="row mb-3">
                            <!-- <div class="col">
                                <input id="pickupLocation" type="text" class="form-control" name="pickupLocation" autofocus>
                            </div> -->
                            <div class="col">
                            <input type="text" id="myInput1" class="myInput @error('pickupLocation') is-invalid @enderror" onkeyup="dropdown1()" placeholder="Search.." name="pickupLocation"  autocomplete="off">
                                @error('pickupLocation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <ul id="myUL1" class="myUL">
                                    @foreach($locations as $location)
                                        <li><a onclick="fill1('{{$location}}')">{{$location}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col">
                            <input type="text" id="myInput2" class="myInput @error('dropoffLocation') is-invalid @enderror" onkeyup="dropdown2()" placeholder="Search.." name="dropoffLocation"  autocomplete="off">
                                @error('dropoffLocation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <ul id="myUL2" class="myUL">
                                    @foreach($locations as $location)
                                        <li><a onclick="fill2('{{$location}}')">{{$location}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- <div class="col">
                                <input id="dropoffLocation" type="text" class="form-control" name="dropoffLocation" autofocus>
                            </div> -->
                            <div class="col">
                                <input class="p-2" type="date" id="datePickUp" class="form-control  @error('pickupDate') is-invalid @enderror" name="pickupDate">
                                @error('pickupDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input class="p-2" type="date" id="dateDropOff" class="form-control  @error('dropoffDate') is-invalid @enderror" name="dropoffDate">
                                @error('dropoffDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Find Vehicle') }}
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
