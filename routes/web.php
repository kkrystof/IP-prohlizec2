<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
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

Route::resource('room', RoomController::class, ['only' => ['index', 'show']]);

Route::middleware(['auth', 'admin'])->group(function () {
    // User is authentication and has admin role
    
    Route::resource('room', RoomController::class, ['except' => ['index', 'show']]);
    Route::resource('employee', EmployeeController::class, ['except' => ['index', 'show']]);

});

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
