<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Modal -->
<div class="modal fade" id="infoModal{{$car->plate_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Car Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            <img src="{{ asset('images/'.$car->image) }}" width="250px" height="200px" alt="Image" class="img myimg"><br>
            <p class="badge badge-pill badge-primary">{{$car->manufacturer}}</p>
            <p class="badge badge-pill badge-primary">{{$car->model}}</p>
            <p class="badge badge-pill badge-primary">{{$car->year}}</p>
            @if($car->air_conditioning)
              <p class="badge badge-pill badge-primary">Air Conditioning</p>
            @endif
            @if($car->bluetooth)
              <p class="badge badge-pill badge-primary">BlueTooth</p>
            @endif
            <p>Transmission: {{$car->transmission}}</p>
            <p>Fuel Consumption: {{$car->fuel_consumption}}</p>
            <p>Gas Type: {{$car->gas_type}}</p>
            <p>Price: {{$car->price}}</p>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>