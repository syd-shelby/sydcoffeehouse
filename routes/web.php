<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Models\Menu;
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

Route::get('/aboutUs', function () {
  return view('aboutUs');
});

Route::get('/order', [OrderController::class, 'index']);

Route::post('/order', [OrderController::class, 'store']);

Route::get('/menu', [MenuController::class, 'index']);

Route::get('/menu/{id}', [MenuController::class, 'show']);

Route::get('/employee', [OrderController::class, 'index_o'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::delete('/employee', [OrderController::class, 'destroy']);
