<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $primaryKey = 'plate_id';
    public $incrementing = false;

    protected $fillable = [
        'plate_id',
        'manufacturer',
        'model',
        'year',
        'price',
        'insurance',
        'transmission',
        'gas_type',
        'fuel_consumption',
        'air_conditioning',
        'bluetooth',
        'status',
        'image',
        'type',
        'officeNo'
    ];

    public function carType(){
        return $this->hasOne(CarType::class,'type','type');
    }

    public function carOffice(){
        return $this->hasOne(Office::class,'officeNo','officeNo');
    }
    public function carReservation(){
        return $this->hasMany(Reservation::class,'plate_id','plate_id');
    }
}
