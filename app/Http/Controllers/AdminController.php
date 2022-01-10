<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Office;


class AdminController extends Controller
{
    //
    public function viewDashboard(){
        
        $no_customers = Customer::count();
        $no_cars = Car::count();
        $no_rentals = Reservation::count();
        $cars = Car::get();
        $reservations = Reservation::get();

        $sumOfProfit = Car::join('reservations','reservations.plate_id','=','cars.plate_id')->sum('reservations.total_amount');
        
        return view('admin.layouts.dashboard', [
            'no_customers' => $no_customers,
            'no_cars'=>$no_cars,
            'no_rentals'=>$no_rentals,
            'reservations'=>$reservations,
            'cars'=>$cars,
            'sumOfProfit'=>$sumOfProfit
        ]);
    }

    public function indexCars(){

        $cars = Car::get();
        return view('admin.cars.index',[
            'cars'=>$cars
        ]);

    }

    public function editCar($plate_id){

        $car = Car::where('plate_id','=',$plate_id)->first();
        $offices = Office::get();
        $types = CarType::get();
        return view('admin.cars.edit',[
            'car'=>$car,
            'offices'=>$offices,
            'types'=>$types
        ]);

    }

    public function updateCar(Request $request, $plate_id){

        $this->validate($request,[
            'plate_id'=>'required|alpha_num',
            'manufacturer'=>'required|alpha',
            'model'=>'required|alpha',
            'year'=>'required|numeric',
            'price'=>'required|numeric',
            'gas_type'=>'required',
            'fuel_consumption'=>'required'
        ]);

        $car = Car::where('plate_id','=',$plate_id)->first();
        $car->plate_id = $request->input('plate_id');
        $car->manufacturer = $request->input('manufacturer');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->price = $request->input('price');
        $car->gas_type = $request->input('gas_type');
        $car->fuel_consumption = $request->input('fuel_consumption');
        if(!is_null($request->input('air_conditioning'))){
        $car->air_conditioning = $request->input('air_conditioning');
        }
        if(!is_null($request->input('bluetooth'))){
            $car->bluetooth = $request->input('bluetooth');
            }
        if(!is_null($request->input('transmission'))){
            $car->transmission = $request->input('transmission');
            }
        if(!is_null($request->input('type'))){
            $car->type = $request->input('type');
            }
        if(!is_null($request->input('officeNo'))){
            $car->officeNo = $request->input('officeNo');
            }




        if($request->hasFile('image')){
            unlink(public_path('images'.$car->image));
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('images/',$fileName);
            $car->image = $fileName;
        }

        $car->save();

        return redirect()->back()->with('status','Car Edited Successfully');
    }

    public function deleteCar($plate_id){

        $car = Car::where('plate_id','=',$plate_id)->first();

        $car->delete();
        return redirect('/admin/cars')->with('status','Car Deleted Successfullly');

    }


    public function makeAvailable($plate_id){
        $car = Car::where('plate_id','=',$plate_id)->first();

        $car->status = 1;
        $car->save();
        
        return redirect()->back()->with('status','Car Status Changed Successfully');
    }

    public function makeUnavailable($plate_id){
        $car = Car::where('plate_id','=',$plate_id)->first();

        $car->status = 0;
        $car->save();

        return redirect()->back()->with('status','Car Status Changed Successfully');

    }

    public function createCar(){

        $offices = Office::get();
        $types = CarType::get();

        return view('admin.cars.create',[
            'offices'=>$offices,
            'types'=>$types
        ]);

    }

    public function storeCar(Request $request){

            $this->validate($request,[
                'plate_id'=>'required|alpha_num',
                'manufacturer'=>'required|alpha',
                'model'=>'required|alpha',
                'year'=>'required|numeric',
                'transmission'=>'required',
                'price'=>'required|numeric',
                'type'=>'required',
                'officeNo'=>'required',
                'gas_type'=>'required',
                'fuel_consumption'=>'required',
                'air_conditioning'=>'required',
                'bluetooth'=>'required'
            ]);
    
            $car = new Car();
            
            $car->plate_id = $request->input('plate_id');
            $car->manufacturer = $request->input('manufacturer');
            $car->model = $request->input('model');
            $car->year = $request->input('year');
            $car->price = $request->input('price');
            $car->gas_type = $request->input('gas_type');
            $car->fuel_consumption = $request->input('fuel_consumption');
            $car->air_conditioning = $request->input('air_conditioning');
            $car->bluetooth = $request->input('bluetooth');
            $car->transmission = $request->input('transmission');
            $car->type = $request->input('type');
            $car->officeNo = $request->input('officeNo'); 
            $car->status = 1;
    
    
    
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $file->move('images/',$fileName);
                $car->image = $fileName;
            }
            else{
                $car->image = 'car.jpg';
            }
    
            $car->save();
    
            return redirect()->back()->with('status','Car Added Successfully');
        }

    public function indexReservations(){

        $reservations = Reservation::get();
        return view('admin.reservations.index',[
            'reservations'=>$reservations
        ]);
    }

    


}
