<?php

use App\Http\Controllers\Api\DivisionController as ApiDivisionController;
use App\Http\Controllers\Api\MajorController as ApiMajorController;
use App\Http\Controllers\Api\MenuController as ApiMenuController;
use App\Http\Controllers\Api\SectionController as ApiSectionController;
use App\Http\Controllers\Ex\IndexController;
use App\Http\Controllers\Views\DivisionController;
use App\Http\Controllers\Views\EmployeeController;
use App\Http\Controllers\Views\MajorController;
use App\Http\Controllers\Views\MenuController;
use App\Http\Controllers\Views\SectionController;
use App\Http\Controllers\Views\UserController;
use App\Http\Controllers\Views\SupplierTypeController;
use App\Http\Controllers\Views\SupplierController;
use App\Http\Controllers\Views\ColorController;
use App\Http\Controllers\Views\ItemGroupController;
use Illuminate\Routing\RouteGroup;
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

// VIEW

Route::prefix('master')->group(function () {
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('section', [SectionController::class, 'index'])->name('section.index');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('supplier_types', [SupplierTypeController::class, 'index'])->name('supplier_type.index');
    Route::get('suppliers', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('colors', [ColorController::class, 'index'])->name('color.index');
    Route::get('item_groups', [ItemGroupController::class, 'index'])->name('item_group.index');
});

Route::prefix('hrd')->group(function () {
    Route::get('majors', [MajorController::class, 'index'])->name('major.index');
    Route::get('divisions', [DivisionController::class, 'index'])->name('division.index');
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
});

Route::get('home', [IndexController::class, 'home'])->name('index.home');


// API

Route::prefix('api/v1')->group(function () {
    Route::prefix('section')->group(function () {
        Route::get('get', [ApiSectionController::class, 'get'])->name('section.get');
        Route::post('insert', [ApiSectionController::class, 'insert'])->name('section.insert');
        Route::delete('delete', [ApiSectionController::class, 'delete'])->name('section.delete');
        Route::post('update', [ApiSectionController::class, 'update'])->name('section.update');
        Route::put('change', [ApiSectionController::class, 'change'])->name('section.change');
    });

    Route::prefix('menu')->group(function () {
        Route::get('get', [ApiMenuController::class, 'get'])->name('menu.get');
        Route::post('insert', [ApiMenuController::class, 'insert'])->name('menu.insert');
        Route::delete('delete', [ApiMenuController::class, 'delete'])->name('menu.delete');
        Route::post('update', [ApiMenuController::class, 'update'])->name('menu.update');
        Route::put('change', [ApiMenuController::class, 'change'])->name('menu.change');
    });

    Route::prefix('majors')->group(function () {
        Route::get('get', [ApiMajorController::class, 'get'])->name('major.get');
        Route::post('insert', [ApiMajorController::class, 'insert'])->name('major.insert');
        Route::delete('delete', [ApiMajorController::class, 'delete'])->name('major.delete');
        Route::post('update', [ApiMajorController::class, 'update'])->name('major.update');
        Route::put('change', [ApiMajorController::class, 'change'])->name('major.change');
    });

    Route::prefix('divisions')->group(function () {
        Route::get('get', [ApiDivisionController::class, 'get'])->name('division.get');
        Route::post('insert', [ApiDivisionController::class, 'insert'])->name('division.insert');
        Route::delete('delete', [ApiDivisionController::class, 'delete'])->name('division.delete');
        Route::post('update', [ApiDivisionController::class, 'update'])->name('division.update');
        Route::put('change', [ApiDivisionController::class, 'change'])->name('division.change');
    });
});
