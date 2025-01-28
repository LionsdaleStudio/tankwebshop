<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use App\Http\Requests\StoreTankRequest;
use App\Http\Requests\UpdateTankRequest;
use Illuminate\Support\Facades\DB;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanks = Tank::all()->sortByDesc("id"); //Select * From tanks;

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
        $newTank = Tank::create($request->all());

        return back()->with("success", "You have a new tank. Grats!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tank $tank)
    {
        return view("tanks.show", ["tank" => $tank]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tank $tank)
    {
        $tanktypes = DB::table("tanktypes")->get();
        return view("tanks.edit", ["tank" => $tank, "tanktypes" => $tanktypes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTankRequest $request, Tank $tank)
    {
        $tank->update($request->all());
        return back()->with("success", "{$tank->name} was successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tank $tank)
    {
        $tank->delete();
        return back()->with("success", "{$tank->name} was successfully deleted.");
    }

    //Nincs útvonala, ha akarod tesztelni csinálj.
    public function trashed() {
        $tanks = Tank::onlyTrashed()->get();
        dd($tanks);
    }

    public function restore(Tank $tank) {
        $tank->restore();
        return back()->with("success", "The tank was restored.");
    }
    /* Restore vége */

    /* Saját funkció paraméterrel */
    public function addCrewMember($member) {
        return "This is {$member}. {$member} like to blow things up.";
    }
}
