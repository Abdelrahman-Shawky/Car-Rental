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

    

}
