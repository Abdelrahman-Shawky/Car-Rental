<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'SSN',
        'user_id',
        'fname',
        'lname',
        'age',
        'gender',
        'license_no',
        'phone',
        'city',
        'country',
        'image'
    ];

    public function User(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}

