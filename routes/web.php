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

Route::get('/admin', function () {
    return view('welcome');
});
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard',  function () {
        return view('dashboard', [ 'branches' => Branches::all(), 'shipments' => Shipment::all(), 'users' => User::all(), 'packages' => Package::all() ]);
    } )->name('dashboard');

    Route::get("/users/list",[UserController::class,"ListAll"]);
    Route::get("/users/list/driver",[UserController::class,"Driver"]);
    Route::get("/users/list/customer",[UserController::class,"Customer"]);
    Route::get('/users/list/edit/{id}',[UserController::class,'Edit']);
    Route::post("/users/list/update/{id}",[UserController::class,'Update']);
    Route::get("/users/new",[UserController::class,'New_User']);
    Route::post("/users/save",[UserController::class,'Save']);
    Route::get('/users/list/delete/{id}',[UserController::class,'Delete']);

    Route::resource('shipments', ShipmentController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('track', ShipmentTrackController::class);

    Route::get('/branches',[BranchesController::class,"all"]);
    Route::get('/branches/new',[BranchesController::class,"new"]);
    Route::post('/branches/save',[BranchesController::class,"save"]);
    Route::get('/branches/edit/{id}',[BranchesController::class,"edit"]);
    Route::post('/branches/update/{id}',[BranchesController::class,"update"]);
    Route::get('/branches/list/delete/{id}',[BranchesController::class,"delete"]);
    Route::get('/branches/info/{id}',[BranchesController::class,"info"]);
});
