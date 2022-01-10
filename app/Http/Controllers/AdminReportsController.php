<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\Customer;



class AdminReportsController extends Controller
{
    //

    public function periodicReservations(){
        return view('admin.reports.periodReservations');
    }

    public function getPeriodicReservations(Request $request){

        $pickupDate = $request->input('pickupDate');
        $dropoffDate = $request->input('dropoffDate');

        $reservations = Reservation::where([
            ['start_date','>=',$pickupDate],
            ['start_date','<=',$dropoffDate],
            ['end_date','<=',$dropoffDate],
            ['end_date','>=',$pickupDate]
        ])->pluck('res_id');


        $reservationsXcars = Reservation::join('cars','cars.plate_id','=','reservations.plate_id')
        ->join('customers','customers.user_id','=','reservations.user_id');
        $reseravtionsXcars = $reservationsXcars->whereIn('reservations.res_id',$reservations)->get();



        return view('admin.reports.periodicReservations', [
            'reservations'=>$reseravtionsXcars,
            'pickupDate'=>$pickupDate,
            'dropoffDate'=>$dropoffDate
        ]);

        
    }
}
