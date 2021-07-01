<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BranchesController;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Models\Branches;
use App\Models\Shipment;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',  function () {
    return view('dashboard', [ 'branches' => Branches::all(), 'shipments' => Shipment::all() ]);
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
Route::get('/branches',[BranchesController::class,"all"]);
Route::get('/branches/new',[BranchesController::class,"new"]);
Route::post('/branches/save',[BranchesController::class,"save"]);
Route::get('/branches/edit/{id}',[BranchesController::class,"edit"]);
Route::post('/branches/update/{id}',[BranchesController::class,"update"]);
