<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyAddress;

class CompanyAddressesTableSeeder extends Seeder
{
    public function run()
    {
        $address = new CompanyAddress();
        $address->country = 'Country Name';
        $address->city = 'City Name';
        $address->street = 'Street Name';
        $address->save();

    }
}