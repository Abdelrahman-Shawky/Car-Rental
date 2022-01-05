<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'res_id',
        'start_date',
        'end_date',
        'total_amount',
        'pickup_location',
        'dropoff_location',
        'plate_id',
        'SSN',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
    ];
}
