<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\Customer;




class AdminSearchController extends Controller
{
    //
    public function searchCars(){

        $cars = Car::get();
        return view('admin.search.cars',[
            'cars'=>$cars
        ]);
    }

    public function showFilteredCar($plate_id){

        $reservations = Reservation::where('plate_id','=',$plate_id)->get();
        $reseravtionsXcars = Reservation::join('cars','cars.plate_id','=','reservations.plate_id')->get()
        ->where('plate_id','=',$plate_id)->first();
        //If car not reserved
        $carSearched = Car::where('plate_id','=',$plate_id)->first();
        return view('admin.search.car',[
            'reservations'=>$reservations,
            'car'=>$carSearched
        ]);

    }
    public function searchCustomers(){

        $customers = Customer::get();
        return view('admin.search.customers',[
            'customers'=>$customers
        ]);
    }

    public function showFilteredCustomer($user_id){

        $reservations = Reservation::where('user_id','=',$user_id)->get();
        $reseravtionsXcustomers = Reservation::join('customers','customers.user_id','=','reservations.user_id')->get()
        ->where('user_id','=',$user_id)->first();
        return view('admin.search.customer',[
            'reservations'=>$reservations,
            'customer'=>$reseravtionsXcustomers
        ]);

    }

    public function searchReservations(){

        return view('admin.search.reservations');
    }

    public function showFilteredReservations(Request $request){
        $pickDate = $request->input('pickupDate');

        $reservations = Reservation::where('start_date','=',$pickDate)->get();
        // $reseravtionsXcustomers = Reservation::join('customers','customers.user_id','=','reservations.user_id')->get()
        // ->where('user_id','=',$user_id)->first();
        return view('admin.search.reservation',[
            'reservations'=>$reservations,
            'pickupDate'=>$pickDate
        ]);

    }

    public function searchAvailable(){

        return view('admin.search.availabilities');
    }

    public function showFilteredAvailable(Request $request){
        $pickDate = $request->input('pickupDate');

        $reservations = Reservation::where('start_date','=',$pickDate)->get();
        $cars = Car::get();
        // $reseravtionsXcustomers = Reservation::join('customers','customers.user_id','=','reservations.user_id')->get()
        // ->where('user_id','=',$user_id)->first();
        return view('admin.search.availability',[
            'reservations'=>$reservations,
            'pickupDate'=>$pickDate,
            'cars'=>$cars
        ]);

    }   

}
