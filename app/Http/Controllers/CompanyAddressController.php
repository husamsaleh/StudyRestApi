<?php

namespace App\Http\Controllers;

use App\Models\CompanyAddress;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Car;

class CompanyAddressController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function address(){
    $addresses = CompanyAddress::all();
    // Corrected to use 'addresses' to match the variable being passed
    return view('frontend.tables.addresses', compact('addresses'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
        ]);

        CompanyAddress::create($validatedData);

        return redirect()->route('addresses')
                         ->with('success', 'Address created successfully.');
    }


        public function create(){
        return view('frontend.tables.create_address');
        }
   
        public function edit(CompanyAddress $address){
        return view('frontend.tables.edit_address', compact('address'));
    }
    
    public function update(Request $request, CompanyAddress $address){
        $validatedData = $request->validate([
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
        ]);

        $address->update($validatedData);

        return redirect()->route('addresses')->with('success', 'Address updated successfully.');
    }


    public function destroy(CompanyAddress $address){
    $address->delete();

    return redirect()->route('addresses')->with('success', 'Address deleted successfully.');
}





public function showCars(CompanyAddress $address)
{
    $cars = $address->car;
    
    return view('frontend.tables.address_cars', compact('cars', 'address'));
}

}