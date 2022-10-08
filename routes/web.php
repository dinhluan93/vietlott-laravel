<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Power655Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [HomeController::class, "index"]);

Route::resources([
    "home" => HomeController::class,
    "power655" => Power655Controller::class,
]);
