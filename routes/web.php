<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\C_ModelController;

use App\Http\Controllers\CompanyAddressController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});


Route::prefix('cars')->middleware('auth', 'verified')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('frontend.tables.cars');
    Route::get('/create', [CarController::class, 'create'])->name('frontend.tables.cars.create');
    Route::post('/', [CarController::class, 'store'])->name('frontend.tables.cars.store');
    Route::get('/{car}/edit', [CarController::class, 'edit'])->name('frontend.tables.cars.edit');
    Route::put('/{car}', [CarController::class, 'update'])->name('frontend.tables.cars.update');
    Route::delete('/{car}', [CarController::class, 'destroy'])->name('frontend.tables.cars.destroy');
    Route::get('/{car}', [CarController::class, 'show'])->name('frontend.tables.cars.show');
});

Route::get('model/create', [C_ModelController::class, 'create'])->name('frontend.tables.create_model');
Route::post('model', [C_ModelController::class, 'store'])->name('frontend.tables.create_model.store');


Route::prefix('addresses')->middleware('auth')->group(function () {
    Route::get('/', [CompanyAddressController::class, 'address'])->name('addresses');
    Route::get('create', [CompanyAddressController::class, 'create'])->name('frontend.tables.addresses.create');
    Route::post('/', [CompanyAddressController::class, 'store'])->name('frontend.tables.addresses.store');
    Route::get('{address}/edit', [CompanyAddressController::class, 'edit'])->name('frontend.tables.addresses.edit');
    Route::patch('{address}', [CompanyAddressController::class, 'update'])->name('frontend.tables.addresses.update');
    Route::delete('{address}', [CompanyAddressController::class, 'destroy'])->name('frontend.tables.addresses.destroy');
    Route::get('{address}/cars', [CompanyAddressController::class, 'showCars'])->name('addresses.cars');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
