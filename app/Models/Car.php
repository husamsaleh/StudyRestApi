<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Car extends Model
{

    protected $fillable = [
        'name',
        'registrationNum',
        'yearOfManufacture',
        'primary_image',
        'engine_id',
        'company_address_id',
        'car_model_id',
        'created_at',
        'updated_at'
    ];
        protected $hidden = ['created_at', 'updated_at'];


    public function gearboxType()
    {
        return $this->belongsTo(GearboxType::class, 'gearbox_type_id');
    }

    public function engine()
{
    return $this->belongsTo(Engine::class, 'engine_id');
}

    public function companyAddress()
    {
        return $this->belongsTo(CompanyAddress::class, 'company_address_id');
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
