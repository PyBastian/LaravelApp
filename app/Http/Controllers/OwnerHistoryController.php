<?php

namespace App\Http\Controllers;

use App\Models\OwnerHistory;
use Illuminate\Http\Request;

class OwnerHistoryController extends Controller
{
    /**
     * Display a listing of the owner histories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ownerHistories = OwnerHistory::all();
        return view('owner_histories.index', compact('ownerHistories'));
    }

    /**
     * Show the form for creating a new owner history.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner_histories.create');
    }

    /**
     * Store a newly created owner history in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'owner_id' => 'required|exists:owners,id',
        ]);

        OwnerHistory::create($validatedData);

        return redirect()->route('owner_histories.index')->with('success', 'Owner history created successfully.');
    }

    /**
     * Display the specified owner history.
     *
     * @param  \App\Models\OwnerHistory  $ownerHistory
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerHistory $ownerHistory)
    {
        return view('owner_histories.show', compact('ownerHistory'));
    }

    /**
     * Show the form for editing the specified owner history.
     *
     * @param  \App\Models\OwnerHistory  $ownerHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerHistory $ownerHistory)
    {
        return view('owner_histories.edit', compact('ownerHistory'));
    }

    /**
     * Update the specified owner history in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OwnerHistory  $ownerHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OwnerHistory $ownerHistory)
    {
        $validatedData = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $ownerHistory->update($validatedData);

        return redirect()->route('owner_histories.index')->with('success', 'Owner history updated successfully.');
    }

    /**
     * Remove the specified owner history from storage.
     *
     * @param  \App\Models\OwnerHistory  $ownerHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnerHistory $ownerHistory)
    {
        $ownerHistory->delete();

        return redirect()->route('owner_histories.index')->with('success', 'Owner history deleted successfully.');
    }
}
