<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TobuyController;

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

Route::get('/tobuys', [TobuyController::class, 'index']);
Route::get('tobuys/{tobuy}', [TobuyController::class, 'show']);
