<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

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
        'type'
    ];

    public function carType(){
        return $this->hasOne('App\Models\CarType','type','type');
    }
}
