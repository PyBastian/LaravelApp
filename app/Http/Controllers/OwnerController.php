<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:owners,email',
            ]);

            Owner::create($validatedData);

            return redirect()->route('owners.index')->with('success', 'Owner added successfully.');

        } catch (ValidationException $e) {
            // Handle unique email validation error
            if ($e->errors()['email'][0] == 'The email has already been taken.') {
                return back()->withInput()->with('error', 'The email address is already associated with another owner. Please use a different email address.');
            }

            // For other validation errors
            return back()->withErrors($e->errors())->withInput();
        }
    }
    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:owners,email,' . $owner->id,
        ]);

        $owner->update($request->all());
        return redirect()->route('owners.index')->with('success', 'Owner updated successfully.');
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully.');
    }
}
