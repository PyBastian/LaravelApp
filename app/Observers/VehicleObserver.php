<?php

namespace App\Observers;

use App\Models\Vehicle;
use App\Models\OwnerHistory;
use Illuminate\Support\Facades\Log;

class VehicleObserver
{
    public function updated(Vehicle $vehicle)
    {
        // Check if user_id has changed
        Log::info("Owner history created for Vehicle ID {$vehicle->id} with Owner ID {$vehicle->user_id}");

        if ($vehicle->isDirty('user_id')) {
            OwnerHistory::create([
                'vehicle_id' => $vehicle->id,
                'owner_id' => $vehicle->user_id,
            ]);
        }
    }
}
