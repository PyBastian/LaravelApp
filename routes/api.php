use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VehicleController;

<!-- Route::get('/owners', [OwnerController::class, 'index']); -->
Route::get('/vehicles', [VehicleController::class, 'vehicles.index']);
Route::get('/owners', [OwnerController::class, 'index'])->name('owners.index');
Route::get('/owner_histories', [OwnerHistoryController::class, 'index'])->name('owner_histories.index');
