<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'SSN',
        'user_id',
        'fname',
        'lname',
        'image'
    ];

    public function User(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
