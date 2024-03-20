<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Engine;
use App\Models\CompanyAddress;


class CarController extends Controller
{



    public function index()
    {
        //$cars = Car::all();
        $cars = Car::get();
        return response() -> json($cars);
        //dd($cars);
        //return view('frontend.tables.cars', compact('cars'));
    }


    public function show($id)
    {
        $car = Car::with('gearboxType', 'engine', 'companyAddress', 'carModel')->findOrFail($id);


        return view('frontend.tables.car_detail', compact('car'));
    }


    public function create()
    {
        $engines = Engine::all()->map(function ($engine) {
            return [
                'id' => $engine->id,
                'formatted_engine' => $engine->capacity . ', ' . $engine->numberOfCylinders
            ];
        });

        $carModels = CarModel::all();

        $addresses = CompanyAddress::all()->map(function ($address) {
            return [
                'id' => $address->id,
                'formatted_address' => $address->country . ', ' . $address->city . ', ' . $address->street
            ];
        });

        return view('frontend.tables.create_car', compact('engines', 'carModels', 'addresses'));
    }

    public function store(Request $request)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'registrationNum' => 'required|string|max:255',
                'yearOfManufacture' => 'required|integer|min:1900|max:2100',
                'engine' => 'required|exists:engines,id',
                'carModel' => 'required|exists:car_models,id',
                'companyAddress' => 'required|exists:company_addresses,id',
                'primary_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rule for single image
            ]);

            // Create a new car instance
            $car = new Car();
            $car->name = $request->name;
            $car->registrationNum = $request->registrationNum;
            $car->yearOfManufacture = $request->yearOfManufacture;
            $car->engine_id = $request->engine;
            $car->car_model_id = $request->carModel;
            $car->company_address_id = $request->companyAddress;

            // Process uploaded primary image
            if ($request->hasFile('primary_image')) {
                $photo = $request->file('primary_image');
                $photoName = 'car_' . uniqid() . '.' . $photo->getClientOriginalExtension(); // Generate unique filename
                $photo->storeAs('public/images/cars', $photoName); // Store image in storage
                $car->primary_image = $photoName; // Save unique filename to database
            }

            $car->save();

            // Redirect with success message
            return redirect('/cars')->with('success', 'Car is successfully created');
        } catch (\Exception $e) {
            // Redirect with error message
            return redirect()->back()->withInput()->with('error', 'Failed to create car. Please try again.');
        }
    }





    public function edit($id)
        {
            $car = Car::findOrFail($id);
            $engines = Engine::all()->map(function ($engine) {
                return [
                    'id' => $engine->id,
                    'formatted_engine' => $engine->capacity . ', ' . $engine->numberOfCylinders
                ];
            });
            $carModels = CarModel::all();
            $addresses = CompanyAddress::all()->map(function ($address) {
                return [
                    'id' => $address->id,
                    'formatted_address' => $address->country . ', ' . $address->city . ', ' . $address->street
                ];
            });

            return view('frontend.tables.edit_car', compact('car', 'engines', 'carModels', 'addresses'));
        }

        public function update(Request $request, $id)
        {
            try {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'registrationNum' => 'required|string|max:255',
                    // Add validation rules for other fields as needed
                ]);

                $car = Car::findOrFail($id);
                $car->update([
                    'name' => $request->name,
                    'registrationNum' => $request->registrationNum,
                    'yearOfManufacture' => $request->yearOfManufacture,
                    'engine_id' => $request->engine, // Assuming 'engine_id' is the foreign key field
                    'car_model_id' => $request->carModel, // Assuming 'car_model_id' is the foreign key field
                    'company_address_id' => $request->companyAddress // Assuming 'company_address_id' is the foreign key field
                ]);
                return dd($car);
                return redirect('/cars')->with('success', 'Car is successfully updated');
            } catch (\Exception $e) {
                dd($e);
                return redirect()->back()->withInput()->with('error', 'Failed to update car. Please try again.');
            }
        }


    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('frontend.tables.cars')->with('success', 'Car deleted successfully.');
    }



}
