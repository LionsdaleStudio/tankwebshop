<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use App\Http\Requests\StoreTankRequest;
use App\Http\Requests\UpdateTankRequest;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanks = Tank::all(); //Select * From tanks;

        return view("tanks.index", ["tanks" => $tanks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tanks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTankRequest $request)
    {
        Tank::create($request->all());

        return back()->with("success", "You have a new tank. Grats!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tank $tank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tank $tank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTankRequest $request, Tank $tank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tank $tank)
    {
        //
    }

    /* Saját funkció paraméterrel */
    public function addCrewMember($member) {
        return "This is {$member}. {$member} like to blow things up.";
    }
}
