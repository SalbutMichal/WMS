<?php
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\WarehouseController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\EmployeesController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\GroupsController;
// use App\Http\Controllers\Dashboard\WarehouseController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
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
    return view('login');
});
Route::get('/test', function () {
    // dd(Route::getRoutes()->getPrefix('admin'));
    return view('dashboard.dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => [
        // 'auth',
        // 'check.access',
    ],
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');


    Route::group([
        'prefix' => 'warehouse',
        'as' => 'warehouse.',
    ], function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('index');
    });

    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('index');
    });
    Route::group([
        'prefix' => 'employees',
        'as' => 'employees.',
    ], function () {
        Route::get('/', [EmployeesController::class, 'index'])->name('index');
    });
    Route::group([
        'prefix' => 'roles',
        'as' => 'roles.',
    ], function () {
        Route::get('/', [RolesController::class, 'index'])->name('index');
        Route::get('/store', [RolesController::class, 'store'])->name('store');
    });
    Route::group([
        'prefix' => 'groups',
        'as' => 'groups.',
    ], function () {
        Route::get('/', [GroupsController::class, 'index'])->name('index');
        Route::get('/store', [GroupsController::class, 'store'])->name('store');
    });
});
