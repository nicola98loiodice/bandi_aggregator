<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandoController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BandoController::class, 'index']);
