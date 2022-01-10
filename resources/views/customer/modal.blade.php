<!-- Modal -->
<div class="modal" id="carModal{{$reservation->res_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vehicle Information</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3  style="color:blue;"><img src="{{ asset('images/'.$reservation->image) }}" width="250px" height="150px"
                                            alt="Image" class="img myimg"></h3>
                <p class="badge badge-pill badge-primary" style="font-size:1.2rem;border-radius:15px;">{{$reservation->manufacturer}}</p>
                <p class="badge badge-pill badge-primary" style="font-size:1.2rem;border-radius:15px;">{{$reservation->model}}</p>
                <p class="badge badge-pill badge-primary" style="font-size:1.2rem;border-radius:15px;">{{$reservation->year}}</p>
                <p  style="color:blue;">Type: {{$reservation->type}}</p>
                <p  style="color:blue;">Transmission: {{$reservation->transmission}}</p>
                <p style="color:blue;">No of Bags: {{$reservation->no_bags}}</p>
                <p style="color:blue;">No of Passengers: {{$reservation->no_passengers}}</p>
                <p style="color:blue;">Gas: {{$reservation->gas_type}}</p>
                <p style="color:blue;">Fuel Consumption: {{$reservation->fuel_consumption}}</p>
                <p style="color:blue;">Pickup Date: {{$reservation->start_date}}</p>
                <p style="color:blue;">Droppoff Date: {{$reservation->end_date}}</p>
                <p style="color:blue;">Pickup Location: {{$reservation->pickup_location}}</p>
                <p style="color:blue;">Droppoff Location: {{$reservation->dropoff_location}}</p>



      </div>      
      <div class="modal-footer">
            <form action="/delete/{{$reservation->res_id}}" enctype="multipart/form-data" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="border-radius:15px;">Cancel Reservation</button>
            </form>
            <form action="/reservations/pay/{{$reservation->res_id}}" enctype="multipart/form-data" method="POST">
            @csrf

            @if($reservation->paid==0)
            <button type="submit" class="btn btn-primary" style="border-radius:15px;">Pay {{$reservation->total_amount}} EGP</button>
            @else
            <button type="submit" class="btn btn-primary" style="border-radius:15px;" disabled >Pay {{$reservation->total_amount}} EGP</button>
            @endif
            </form>
      </div>
    </div>
  </div>
</div>