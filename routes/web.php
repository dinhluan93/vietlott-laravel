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

Route::get("/power655/top-duplicate", [
    Power655Controller::class,
    "topDuplicate",
])->name("power655.duplicated");

Route::get("/power655/suggest-number", [
    Power655Controller::class,
    "suggestNumber",
])->name("power655.suggestNumber");

Route::get("/power655/random-with-match", [
    Power655Controller::class,
    "randomWithMatch",
])->name("power655.randomWithMatch");

Route::post("/power655/random-with-match", [
    Power655Controller::class,
    "randomWithMatchPost",
])->name("power655.randomWithMatchPost");

Route::resources([
    "home" => HomeController::class,
    "power655" => Power655Controller::class,
]);
