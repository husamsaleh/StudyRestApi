<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    protected $table = 'engines';

    use HasFactory;
    protected $fillable = ['capacity', 'numberOfCylinders','created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];


    public function car()
    {
        return $this->hasMany(Car::class);
    }
}

