<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;
    protected $table = 'company_addresses';

    protected $fillable = ['country', 'city', 'street'];
    protected $hidden = ['created_at', 'updated_at'];

    public function car()
    {
        return $this->hasMany(Car::class);
    }
}

