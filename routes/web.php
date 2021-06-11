<?php

use App\Http\Controllers\Ex\IndexController;
use App\Http\Controllers\Views\MenuController;
use Illuminate\Support\Facades\Route;

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

Route::get('home', [IndexController::class, 'home'])->name('index.home');
Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
