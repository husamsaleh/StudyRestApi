<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\CarModel;
use Illuminate\Http\Request;



class C_ModelController extends Controller
{
    public function create()
    {
        return view('frontend.tables.create_model');
    }
    public function store(Request $request)
    {
    $carModel = CarModel::create([
        'name'=> $request->name,
    ]);
        
        return redirect('/cars')->with('success', 'model is successfully created');
    }


}
