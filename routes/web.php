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

   

Route::get('/', [TobuyController::class, 'index']);
Route::get('tobuys/create', [TobuyController::class, 'create']);
Route::get('tobuys/{tobuy}', [TobuyController::class, 'show']);
Route::post('/tobuys', [TobuyController::class, 'store']);
Route::get('/tobuys/{tobuy}/edit', [TobuyController::class, 'edit']);

