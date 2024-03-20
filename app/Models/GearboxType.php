<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class GearboxType extends Model
{
    use HasFactory;

    protected $table = 'gearbox_types';
    protected $fillable = ['type'];
    //0 = manual, 1 = automatic	

    public function car()
    {
        return $this->hasMany(Car::class);
    }
}