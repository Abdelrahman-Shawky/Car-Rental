<!-- Modal -->
<div class="modal" id="carModal{{$car->plate_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vehicle Information</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3  style="color:blue;"><img src="{{ asset('images/'.$car->image) }}" width="250px" height="150px"
                                            alt="Image" class="img myimg"></h3>
                <p class="badge badge-pill badge-primary" style="font-size:1.2rem;border-radius:15px;">{{$car->manufacturer}}</p>
                <p class="badge badge-pill badge-primary" style="font-size:1.2rem;border-radius:15px;">{{$car->model}}</p>
                <p class="badge badge-pill badge-primary" style="font-size:1.2rem;border-radius:15px;">{{$car->year}}</p>
                <p  style="color:blue;">Type: {{$car->type}}</p>
                <p  style="color:blue;">Transmission: {{$car->transmission}}</p>
                <p style="color:blue;">No of Bags: {{$car->CarType->no_bags}}</p>
                <p style="color:blue;">No of Passengers: {{$car->CarType->no_passengers}}</p>
                <p style="color:blue;">Gas: {{$car->gas_type}}</p>
                <p style="color:blue;">Fuel Consumption: {{$car->fuel_consumption}}</p>
                <p style="color:blue;">Pickup Date: {{$pickupDate}}</p>
                <p style="color:blue;">Droppoff Date: {{$dropoffDate}}</p>
                <p style="color:blue;">Pickup Location: {{$pickupLocation}}</p>
                <p style="color:blue;">Droppoff Location: {{$dropoffLocation}}</p>



      </div>      
      <div class="modal-footer">
            <form action="/reserve/{{$car->plate_id}}/{{$pickupDate}}/{{$dropoffDate}}/{{$pickupLocation}}/{{$dropoffLocation}}" enctype="multipart/form-data" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="border-radius:15px;">Confirm Reservation</button>
            </form>
            <button type="button" class="btn btn-primary" data-dismiss="modal"  style="border-radius:15px;">Close</button>
      </div>
    </div>
  </div>
</div>