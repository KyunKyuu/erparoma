<?php

use App\Http\Controllers\Api\AreaController as ApiAreaController;
use App\Http\Controllers\Api\DivisionController as ApiDivisionController;
use App\Http\Controllers\Api\EmployeeController as ApiEmployeeController;
use App\Http\Controllers\Api\MajorController as ApiMajorController;
use App\Http\Controllers\Api\MenuController as ApiMenuController;
use App\Http\Controllers\Api\SectionController as ApiSectionController;
use App\Http\Controllers\Api\SupplierTypeController as ApiSupplierTypeController;
use App\Http\Controllers\Api\SupplierController as ApiSupplierController;
use App\Http\Controllers\Api\ColorController as ApiColorController;
use App\Http\Controllers\Api\ItemGroupController as ApiItemGroupController;
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
    Route::prefix('employee')->group(function () {
        Route::get('get', [ApiEmployeeController::class, 'get'])->name('employee.get');
        Route::post('insert', [ApiEmployeeController::class, 'insert'])->name('employee.insert');
        Route::delete('delete', [ApiEmployeeController::class, 'delete'])->name('employee.delete');
        Route::post('update', [ApiEmployeeController::class, 'update'])->name('employee.update');
        Route::put('change', [ApiEmployeeController::class, 'change'])->name('employee.change');
    });

    Route::prefix('supplier_types')->group(function () {
        Route::get('get', [ApiSupplierTypeController::class, 'get'])->name('supplier_type.get');
        Route::post('insert', [ApiSupplierTypeController::class, 'insert'])->name('supplier_type.insert');
        Route::delete('delete', [ApiSupplierTypeController::class, 'delete'])->name('supplier_type.delete');
        Route::post('update', [ApiSupplierTypeController::class, 'update'])->name('supplier_type.update');
        Route::put('change', [ApiSupplierTypeController::class, 'change'])->name('supplier_type.change');
    });

    Route::prefix('suppliers')->group(function () {
        Route::get('get', [ApiSupplierController::class, 'get'])->name('supplier.get');
        Route::post('insert', [ApiSupplierController::class, 'insert'])->name('supplier.insert');
        Route::delete('delete', [ApiSupplierController::class, 'delete'])->name('supplier_.delete');
        Route::post('update', [ApiSupplierController::class, 'update'])->name('supplier.update');
        Route::put('change', [ApiSupplierController::class, 'change'])->name('supplier.change');
    });

    Route::prefix('colors')->group(function () {
        Route::get('get', [ApiColorController::class, 'get'])->name('color.get');
        Route::post('insert', [ApiColorController::class, 'insert'])->name('color.insert');
        Route::delete('delete', [ApiColorController::class, 'delete'])->name('color_.delete');
        Route::post('update', [ApiColorController::class, 'update'])->name('color.update');
        Route::put('change', [ApiColorController::class, 'change'])->name('color.change');
    });

    Route::prefix('item_groups')->group(function () {
        Route::get('get', [ApiItemGroupController::class, 'get'])->name('item_group.get');
        Route::post('insert', [ApiItemGroupController::class, 'insert'])->name('item_group.insert');
        Route::delete('delete', [ApiItemGroupController::class, 'delete'])->name('item_group_.delete');
        Route::post('update', [ApiItemGroupController::class, 'update'])->name('item_group.update');
        Route::put('change', [ApiItemGroupController::class, 'change'])->name('item_group.change');
    });

    Route::prefix('area')->group(function () {
        Route::prefix('regency')->group(function () {
            Route::get('get', [ApiAreaController::class, 'regency_get'])->name('regency.get');
        });
        Route::prefix('district')->group(function () {
            Route::get('get', [ApiAreaController::class, 'district_get'])->name('district.get');
        });
        Route::prefix('village')->group(function () {
            Route::get('get', [ApiAreaController::class, 'village_get'])->name('village.get');
        });
    });
});
