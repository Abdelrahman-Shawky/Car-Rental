<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Office;

use Illuminate\Validation\Concerns\FilterEmailValidation;

class ReservationController extends Controller
{


    public function delete(Request $request, $res_id){
        $reservation = Reservation::where('res_id','=',$res_id)->first();

        $reservation->delete();
        return redirect()->back()->with('status','Cancelled Successfully');

    }

    public function reserve($id,$pickupDate,$dropoffDate,$pickupLocation,$dropoffLocation,$numOfDays){

        $reservation = new Reservation();
        $reservation->start_date = $pickupDate;

        $getResId = Reservation::count();

        $reservation->res_id = $getResId+1;
        $reservation->end_date = $dropoffDate;
        $reservation->pickup_location = $pickupLocation;
        $reservation->dropoff_location = $dropoffLocation;

        $carSelected = Car::where('plate_id','=',$id)->first();
        $reservation->total_amount = $carSelected->price* $numOfDays;
        $reservation->plate_id = $id;

        $user = auth()->user();

        $custumer = Customer::where('user_id','=',$user->id)->first();

        $reservation->SSN = $custumer->SSN;
        $reservation->user_id = $user->id;
        $reservation->paid = 0;
        $reservation->save();

        $locations = Office::groupby('location')->pluck('location');


        // return redirect()->back()->with('status','Reserved Successfully');
        return redirect('/home')->with('status','Reserved Successfully');

    }

    public function datePicker(Request $request){

        $this->validate($request,[
            'pickupLocation'=>'required|regex:/^[\pL\s\-]+$/u',
            'dropoffLocation'=>'required|regex:/^[\pL\s\-]+$/u',
            'pickupDate'=>'required',
            'dropoffDate'=>'required'
        ]);

        
        // $cars = Car::get();
        $manufacturers = Car::groupBy('manufacturer')->pluck('manufacturer');
        $models = Car::groupBy('model')->pluck('model');
        $years = Car::groupBy('year')->pluck('year');
        $types = Car::groupBy('type')->pluck('type');
        $transmissions = Car::groupBy('transmission')->pluck('transmission');

        $pickupDate = $request->input('pickupDate');
        $dropoffDate = $request->input('dropoffDate');
        $pickupLocation = $request->input('pickupLocation');
        $dropoffLocation = $request->input('dropoffLocation');


        $reservations = Reservation::where([
            ['start_date','<=',$dropoffDate],
            ['start_date','>=',$pickupDate]
        ])->orWhere([
            ['end_date','>=',$pickupDate],
            ['end_date','<=',$dropoffDate]
        ])
        ->orWhere([
            ['start_date','<=',$pickupDate],
            ['end_date','>=',$dropoffDate]
        ])->pluck('plate_id');

        // $carsXoffices = Car::join('offices','cars.officeNo','=','offices.officeNo');
        $office = Office::where('location','=',$pickupLocation)->pluck('officeNo');

        $cars = Car::whereNotIn('plate_id',$reservations)
        ->whereIn('officeNo',$office)
        ->where('status','=',1)
        ->get();

        $pickupDate2 = \Carbon\Carbon::parse($request->input('pickupDate'));
        $dropoffDate2 = \Carbon\Carbon::parse($request->input('dropoffDate'));

        $numOfDays = $dropoffDate2->diffInDays($pickupDate2);
        
        return view('carList',[
            'cars'=>$cars,
            'manufacturers'=>$manufacturers,
            'filteredManufacturers'=>$manufacturers,
            'models'=>$models,
            'years'=>$years,
            'types'=>$types,
            'transmissions'=>$transmissions,
            'filteredModels'=>$models,
            'filteredYears'=>$years,
            'filteredTypes'=>$types,
            'filteredTransmissions'=>$transmissions,
            'pickupDate'=>$pickupDate,
            'dropoffDate'=>$dropoffDate,
            'pickupLocation'=>$pickupLocation,
            'dropoffLocation'=>$dropoffLocation,
            'numOfDays'=>$numOfDays
        ]);

    }

    public function filter(Request $request,$pickupDate,$dropoffDate,$pickupLocation,$dropoffLocation,$numOfDays)
    {
        //Filter according to filled checkboxes
        $manufacturers = Car::groupBy('manufacturer')->pluck('manufacturer');

        $i = 0;
        $filteredManufacturers=null;
        foreach($manufacturers as $manufacturer){
            if($request->input($manufacturer)){
            $filteredManufacturers[$i]=$manufacturer;
            }
            $i++; 
        }
        $i = 0;
        if($filteredManufacturers==null){
            foreach($manufacturers as $manufacturer){
                $filteredManufacturers[$i]=$manufacturer;
                $i++; 
            }
        }
        $filteredManufacturers = Car::whereIn('manufacturer',$filteredManufacturers)->groupBy('manufacturer')->pluck('manufacturer');

        $models = Car::groupBy('model')->pluck('model');
        $i = 0;
        $filteredModels=null;
        foreach($models as $model){
            if($request->input($model)){
            $filteredModels[$i]=$model;
            }
            $i++; 
        }
        $i = 0;
        if($filteredModels==null){
            foreach($models as $model){
                $filteredModels[$i]=$model;
                $i++; 
            }
        }
        $filteredModels = Car::whereIn('model',$filteredModels)->groupBy('model')->pluck('model');

        $years = Car::groupBy('year')->pluck('year');
        $i = 0;
        $filteredYears=null;
        foreach($years as $year){
            if($request->input($year)){
            $filteredYears[$i]=$year;
            }
            $i++; 
        }
        $i = 0;
        if($filteredYears==null){
            foreach($years as $year){
                $filteredYears[$i]=$year;
                $i++; 
            }
        }
        $filteredYears = Car::whereIn('year',$filteredYears)->groupBy('year')->pluck('year');

        $types = Car::groupBy('type')->pluck('type');
        $i = 0;
        $filteredTypes=null;
        foreach($types as $type){
            if($request->input($type)){
            $filteredTypes[$i]=$type;
            }
            $i++; 
        }
        $i = 0;
        if($filteredTypes==null){
            foreach($types as $type){
                $filteredTypes[$i]=$type;
                $i++; 
            }
        }
        $filteredTypes = Car::whereIn('type',$filteredTypes)->groupBy('type')->pluck('type');

        $transmissions = Car::groupBy('transmission')->pluck('transmission');
        $i = 0;
        $filteredTransmissions=null;
        foreach($transmissions as $transmission){
            if($request->input($transmission)){
            $filteredTransmissions[$i]=$transmission;
            }
            $i++; 
        }
        $i = 0;
        if($filteredTransmissions==null){
            foreach($transmissions as $transmission){
                $filteredTransmissions[$i]=$transmission;
                $i++; 
            }
        }
        $filteredTransmissions = Car::whereIn('transmission',$filteredTransmissions)->groupBy('transmission')->pluck('transmission');

        //Get Available Cars
        $reservations = Reservation::where([
            ['start_date','<=',$dropoffDate],
            ['start_date','>=',$pickupDate]
        ])->orWhere([
            ['end_date','>=',$pickupDate],
            ['end_date','<=',$dropoffDate]
        ])
        ->orWhere([
            ['start_date','<=',$pickupDate],
            ['end_date','>=',$dropoffDate]
        ])->pluck('plate_id');

        $office = Office::where('location','=',$pickupLocation)->pluck('officeNo');

        $cars = Car::whereNotIn('plate_id',$reservations)
        ->whereIn('officeNo',$office)
        ->whereIn('manufacturer',$filteredManufacturers)
        ->whereIn('model',$filteredModels)
        ->whereIn('year',$filteredYears)
        ->whereIn('type',$filteredTypes)
        ->whereIn('transmission',$filteredTransmissions)
        ->where('status','=',1)
        ->get();

        if($cars == null){
            return redirect('/home')->with('status','No Matches Found');
        }

        return view('carList',[
            'cars'=>$cars,
            'manufacturers'=>$manufacturers,
            'models'=>$models,
            'years'=>$years,
            'types'=>$types,
            'transmissions'=>$transmissions,
            'filteredManufacturers'=>$filteredManufacturers,
            'filteredModels'=>$filteredModels,
            'filteredYears'=>$filteredYears,
            'filteredTypes'=>$filteredTypes,
            'filteredTransmissions'=>$filteredTransmissions,
            'pickupDate'=>$pickupDate,
            'dropoffDate'=>$dropoffDate,
            'pickupLocation'=>$pickupLocation,
            'dropoffLocation'=>$dropoffLocation,
            'numOfDays'=>$numOfDays    
        ]);    
    }
}
