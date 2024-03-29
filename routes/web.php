<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;

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
Route::get('/register-home', [App\Http\Controllers\RegisterController::class, 'index'])->name('register-home');


Route::get('/menu/index', [App\Http\Controllers\MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu.show');
Route::get('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::get('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [App\Http\Controllers\MenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('menu.destroy');



Route::get('/user/show/{id}', [UserController::class, 'show'])->name('show');
Route::get('/user/show1/{id}', [UserController::class, 'show1'])->name('show1');
Route::get('/user/show2/{id}', [UserController::class, 'show2'])->name('show2');


Route::get('/buy/index/{id}',[App\Http\Controllers\BuyController::class, 'index'])->name('buy.index');
Route::post('/buy/store',[App\Http\Controllers\BuyController::class, 'store'])->name('buy.store');
Route::delete('/buy/destroy/{id}', [App\Http\Controllers\BuyController::class, 'destroy'])->name('buy.destroy');
Route::put('/buy/{id}', [App\Http\Controllers\BuyController::class, 'update'])->name('buy.update');
Route::patch('/buy/check', [App\Http\Controllers\BuyController::class, 'checkUpdate'])->name('buy.checkUpdate');

Route::get('/buy/comment',[App\Http\Controllers\CommentController::class, 'comment'])->name('comment');
Route::post('/buy/postComment', [App\Http\Controllers\CommentController::class, 'postComment'])->name('postComment');
Route::delete('/buy/delete/{id}', [App\Http\Controllers\CommentController::class, 'destroyComment'])->name('destroyComment');

Route::get('/stock',[App\Http\Controllers\StockController::class, 'index'])->name('stock.index');
Route::get('/stock/create', [App\Http\Controllers\StockController::class, 'create'])->name('stock.create');

Route::post('/stock/store',[App\Http\Controllers\StockController::class, 'store'])->name('stock.store');
Route::delete('/stock/{id}', [App\Http\Controllers\StockController::class, 'destroy'])->name('stock.destroy');


Route::get('/profile',[App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/ingredient',[App\Http\Controllers\BuyController::class, 'getIngredient'])->name('ingredient');

