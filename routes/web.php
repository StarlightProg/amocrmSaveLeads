<?php

use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\LeadsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/credentials', [CredentialsController::class,'index']);

Route::get('/leads', [LeadsController::class,'index']);