<?php

use Illuminate\Contracts\Console\Application;
use Illuminate\Support\Facades\Route;
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

Route::get('/customers/search', [
    App\Http\Controllers\CustomerController::class, 'write1'
]);

// Route::post('/customers/address', [App\Http\Controllers\CustomerController::class, 'address']);


Route::resource('/customers', App\Http\Controllers\CustomerController::class);
