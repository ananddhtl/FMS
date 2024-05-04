<?php

namespace App\Http\Controllers;

use App\Models\FutsalTimeSlots;
use App\Models\FutsalDetails;
use Illuminate\Http\Request;

class FutsalTimeSlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function addfutsaltimeslots()
    {
        $futsals = FutsalDetails::get();
        return view('admin.futsaltimeslots.add', compact('futsals'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FutsalTimeSlots $futsalTimeSlots)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FutsalTimeSlots $futsalTimeSlots)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FutsalTimeSlots $futsalTimeSlots)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FutsalTimeSlots $futsalTimeSlots)
    {
        //
    }
}
