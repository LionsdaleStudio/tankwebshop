<?php

use App\Http\Controllers\TankController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

/* Tank útvonalak */
Route::resource("/tanks", TankController::class);
Route::get("/tanks/addCrewMember/{member}", [TankController::class, "addCrewMember"]);