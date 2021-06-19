<?php

use App\Http\Controllers\Api\DivisionController as ApiDivisionController;
use App\Http\Controllers\Api\BranchController as ApiBranchController;
use App\Http\Controllers\Api\BranchTypeController as ApiBranchTypeController;
use App\Http\Controllers\Api\BrandController as ApiBrandController;
use App\Http\Controllers\Api\CustomerTypeController as ApiCustomerTypeController;
use App\Http\Controllers\Api\MajorController as ApiMajorController;
use App\Http\Controllers\Api\MenuController as ApiMenuController;
use App\Http\Controllers\Api\SectionController as ApiSectionController;
use App\Http\Controllers\Ex\IndexController;
use App\Http\Controllers\Views\DivisionController;
use App\Http\Controllers\Views\BranchController;
use App\Http\Controllers\Views\BranchTypeController;
use App\Http\Controllers\Views\BrandController;
use App\Http\Controllers\Views\CustomerTypeController;
use App\Http\Controllers\Views\MajorController;
use App\Http\Controllers\Views\MenuController;
use App\Http\Controllers\Views\SectionController;
use App\Http\Controllers\Views\UserController;
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
    Route::get('branch', [BranchController::class, 'index'])->name('branch.index');
    Route::get('branch_type', [BranchTypeController::class, 'index'])->name('branch_type.index');
    Route::get('brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('customer_type', [CustomerTypeController::class, 'index'])->name('customer_type.index');
});

Route::prefix('hrd')->group(function () {
    Route::get('majors', [MajorController::class, 'index'])->name('major.index');
    Route::get('divisions', [DivisionController::class, 'index'])->name('division.index');
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

    Route::prefix('branch')->group(function () {
        Route::get('get', [ApiBranchController::class, 'get'])->name('branch.get');
        Route::post('insert', [ApiBranchController::class, 'insert'])->name('branch.insert');
        Route::delete('delete', [ApiBranchController::class, 'delete'])->name('branch.delete');
        Route::post('update', [ApiBranchController::class, 'update'])->name('branch.update');
        Route::put('change', [ApiBranchController::class, 'change'])->name('branch.change');
    });

    Route::prefix('branch_type')->group(function () {
        Route::get('get', [ApiBranchTypeController::class, 'get'])->name('branch_type.get');
        Route::post('insert', [ApiBranchTypeController::class, 'insert'])->name('branch_type.insert');
        Route::delete('delete', [ApiBranchTypeController::class, 'delete'])->name('branch_type.delete');
        Route::post('update', [ApiBranchTypeController::class, 'update'])->name('branch_type.update');
        Route::put('change', [ApiBranchTypeController::class, 'change'])->name('branch_type.change');
    });

    Route::prefix('brand')->group(function () {
        Route::get('get', [ApiBrandController::class, 'get'])->name('brand.get');
        Route::post('insert', [ApiBrandController::class, 'insert'])->name('brand.insert');
        Route::delete('delete', [ApiBrandController::class, 'delete'])->name('brand.delete');
        Route::post('update', [ApiBrandController::class, 'update'])->name('brand.update');
        Route::put('change', [ApiBrandController::class, 'change'])->name('brand.change');
    });

    Route::prefix('customer_type')->group(function () {
        Route::get('get', [ApiCustomerTypeController::class, 'get'])->name('customer_type.get');
        Route::post('insert', [ApiCustomerTypeController::class, 'insert'])->name('customer_type.insert');
        Route::delete('delete', [ApiCustomerTypeController::class, 'delete'])->name('customer_type.delete');
        Route::post('update', [ApiCustomerTypeController::class, 'update'])->name('customer_type.update');
        Route::put('change', [ApiCustomerTypeController::class, 'change'])->name('customer_type.change');
    });
});