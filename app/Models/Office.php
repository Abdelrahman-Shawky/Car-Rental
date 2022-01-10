<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'officeNo',
        'city',
        'country',
        'location',
        'phone'

    ];

    public function car(){
        return $this->belongsTo(Car::class,'OfficeNo','officeNo');

    }
}
