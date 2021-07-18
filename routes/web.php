<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BranchesController;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ShipmentTrackController;
use App\Models\Branches;
use App\Models\Package;
use App\Models\Shipment;
use App\Models\User;

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

Route::get('/', function () {
    return view('client');
});
