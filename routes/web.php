<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BranchesController;
use Illuminate\Http\Request;


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('shipments', ShipmentController::class);
Route::resource('packages', PackageController::class);
Route::get('/branches',[BranchesController::class,"all"]);
Route::get('/branches/new',[BranchesController::class,"new"]);
Route::post('/branches/save',[BranchesController::class,"save"]);
Route::get('/branches/edit/{id}',[BranchesController::class,"edit"]);
Route::post('/branches/update/{id}',[BranchesController::class,"update"]);
