<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TobuyController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'tobuys.top');
Route::view('/group/create', 'groups.create');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(TobuyController::class)->middleware(['auth'])->group(function(){
    Route::get('/index','index')->name('index');
    Route::get('/tobuys/create', 'create');
    Route::get('/groups/{group}', 'group_by');
    Route::get('/tobuys/{tobuy}/show', 'show');
    Route::post('/tobuys', 'store');
    Route::get('/tobuys/{tobuy}/edit', 'edit');
    Route::put('/tobuys/{tobuy}','update');
    Route::delete('tobuys/{tobuy}', 'delete');
});

Route::controller(GroupController::class)->middleware(['auth'])->group(function(){
    Route::get('/group', 'index')->name('group');
    Route::post('/group/leave/{group}', 'leave');
    Route::post('/group', 'create');
    Route::post('/group/add', 'add');
    Route::post('/group/permission/{user}/{group}', 'permission');
    Route::post('/group/permissionReject/{user}/{group}', 'reject');
    Route::delete('/group/{group}', 'delete');
});


// Route::get('/group', [GroupController::class,'index'])->name('group');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/chat/{group}', [ChatController::class, 'chat']);

Route::post('/chat', [ChatController::class, 'sendMessage']);

require __DIR__.'/auth.php';
