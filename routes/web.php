<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ToBuyController;

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



























// Route::get('/profile', function () {
//     return view('profile');
// });

// Route::get('/menu', function () {
//     return view('menu');
// });

// Route::get('/posts', function () {
//     return view('posts');
// }); 

Route::get('/user/show/{id}', [UserController::class, 'show'])->name('show');


Route::get('/foraday', function () {
    return view('foraday');
});