<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Office;


class AdminFilteredSearchController extends Controller
{
    //

    public function filterByCar(){

        
        $manufacturers = Car::groupBy('manufacturer')->pluck('manufacturer');
        $models = Car::groupBy('model')->pluck('model');
        $years = Car::groupBy('year')->pluck('year');
        $types = Car::groupBy('type')->pluck('type');
        $transmissions = Car::groupBy('transmission')->pluck('transmission');

        $cars = Car::get();

        
        return view('admin.filteredSearch.filterBycars',[
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
            'filteredTransmissions'=>$transmissions
        ]);

    }

    public function filteredByCar(Request $request)
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


        $cars = Car::whereIn('manufacturer',$filteredManufacturers)
        ->whereIn('model',$filteredModels)
        ->whereIn('year',$filteredYears)
        ->whereIn('type',$filteredTypes)
        ->whereIn('transmission',$filteredTransmissions)
        ->where('status','=',1)
        ->get();

        if($cars == null){
            return redirect()->back()->with('status','Dehkk');
        }

        return view('admin.filteredSearch.filteredByCar',[
            'cars'=>$cars
        ]);    
    }

    public function customerFilteredByCar($plate_id){
        $reservations = Reservation::where('plate_id','=',$plate_id)->pluck('user_id');
        if(!is_null($reservations)){
            $customers = Customer::whereIn('user_id',$reservations)->get();
        }
        else{
            $customer=null;
        }


        return view('admin.filteredSearch.customersFilteredByCar',[
            'customers'=>$customers
        ]);  
    }
}
