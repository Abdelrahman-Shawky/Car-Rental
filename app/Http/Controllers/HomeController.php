<?php

namespace App\Http\Controllers;
use App\Models\Car;
use DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        return view('home');
    }

    public function show()
    {  
        $cars = Car::get();
        $manufacturers = Car::groupBy('manufacturer')->pluck('manufacturer');
        $models = Car::groupBy('model')->pluck('model');
        $years = Car::groupBy('year')->pluck('year');
        $types = Car::groupBy('type')->pluck('type');
        $transmissions = Car::groupBy('transmission')->pluck('transmission');

        
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
            'filteredTransmissions'=>$transmissions 
        ]);
    }

    public function filter(Request $request)
    {

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
        echo $filteredManufacturers;

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
        echo $filteredModels;

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
        echo $filteredYears;

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
        echo $filteredTypes;

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
        echo $filteredTransmissions;
        





        $cars = Car::whereIn('manufacturer',$filteredManufacturers)
        ->whereIn('model',$filteredModels)
        ->whereIn('year',$filteredYears)
        ->whereIn('type',$filteredTypes)
        ->whereIn('transmission',$filteredTransmissions)
        ->get();
        if($cars == null){
            echo "dehk";
            return redirect()->back()->with('status','Dehkk');
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
            'filteredTransmissions'=>$filteredTransmissions           
        ]);    
    }

}
