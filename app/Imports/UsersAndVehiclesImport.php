<?php
namespace App\Imports;

use App\Models\Owner;
use App\Models\Vehicle;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class UsersAndVehiclesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Check if the user already exists
        $owner = Owner::firstOrCreate(
            ['email' => $row['correo']],
            [
                'name' => $row['nombre'],
                'last_name' => $row['apellidos'],
            ]
        );

        // Check if the vehicle already exists
        $existingVehicle = Vehicle::where('license_plate', $row['patente'])->first();
        if ($existingVehicle) {
            Log::info("Vehicle with license plate {$row['patente']} already exists.");
        } else {
            // Create a new vehicle associated with the user
            $vehicle = new Vehicle([
                'brand' => $row['marca'],
                'model' => $row['modelo'],
                'license_plate' => $row['patente'],
                'year' => $row['año'],
                'price' => $row['precio'],
                'user_id' => $owner->id,
            ]);
            $vehicle->save();
        }
    }
}
