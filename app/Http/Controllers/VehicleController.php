<?php

namespace App\Http\Controllers;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\OwnerHistory;

class VehicleController extends Controller
{
    public function index()
    {
        // Fetch all vehicles with their associated owners
        $vehicles = Vehicle::with('owner')->get();
        return view('vehicles.index', compact('vehicles'));
    
    }

    public function create()
    {
        $owners = Owner::all();
        return view('vehicles.create', compact('owners'));
    }
    public function store(Request $request)
    {
        try {

            // Validate incoming request data
            $validatedData2 = $request->validate([
                'brand' => 'required|string',
                'model' => 'required|string',
                'license_plate' => 'required|string|unique:vehicles,license_plate',
                'year' => 'required|integer',
                'price' => 'required|numeric',
                'user_id' => 'required|exists:owners,id', // Validate owner_id
            ]);
            // dd($validatedData); // Use dd() to dump and die for better readability

            // Create a new vehicle with owner_id
            Vehicle::create($validatedData2);
            // Redirect back or to a success page
            return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully.');
        
        } catch (ValidationException $e) {
            if ($e->errors()['license_plate'][0] == 'The license_plate has already been taken.') {
                return back()->withInput()->with('error', 'The license_plate is already associated with another car. Please use a different license_plate.');
            }

            // For other validation errors
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function edit(Vehicle $vehicle)
    {
        $owners = Owner::all();
        return view('vehicles.edit', compact('vehicle', 'owners'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'license_plate' => 'required|string|unique:vehicles,license_plate,'.$vehicle->id,
            'year' => 'required|integer',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:owners,id', // Validate owner_id
        ]);

        // Update the vehicle with the new data
        $vehicle->update($validatedData);
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}

