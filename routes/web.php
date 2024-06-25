<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OwnerHistoryController;

    use App\Http\Controllers\ImportController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', function() {
    return view('import');
});

Route::post('import-excel', [ImportController::class, 'importExcel'])->name('import.excel');

Route::resource('owners', OwnerController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('owner_histories', OwnerHistoryController::class);

// Route::post('import', [ImportController::class, 'import'])->name('import');;

// Route to show form to add new owner
Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create');

// Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
// Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');

// Route to show form to add new vehicle
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/import', [ImportController::class, 'import'])->name('import');
