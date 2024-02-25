<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/menu/index', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::get('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');


Route::get('/buy/index',[App\Http\Controllers\BuyController::class, 'index'])->name('buy.index');
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('show');
Route::get('/user/show1/{id}', [UserController::class, 'show1'])->name('show1');
Route::get('/user/show2/{id}', [UserController::class, 'show2'])->name('show2');
