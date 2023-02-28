<?php
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\WarehouseController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\EmployeesController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\GroupsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ReceiptsController;
use App\Http\Controllers\Dashboard\ReleasesController;
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
        Route::get('/create', [WarehouseController::class, 'create'])->name('create');
        Route::post('/store', [WarehouseController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [WarehouseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [WarehouseController::class, 'update'])->name('update');
    });

    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('/create', [ProductsController::class, 'create'])->name('create');
        Route::post('/store', [ProductsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update');
    });
    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.',
    ], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
    });
    Route::group([
        'prefix' => 'receipts',
        'as' => 'receipts.',
    ], function () {
        Route::get('/', [ReceiptsController::class, 'index'])->name('index');
        Route::get('/create', [ReceiptsController::class, 'create'])->name('create');
        Route::post('/store', [ReceiptsController::class, 'store'])->name('store');
    });
    Route::group([
        'prefix' => 'releases',
        'as' => 'releases.',
    ], function () {
        Route::get('/', [ReleasesController::class, 'index'])->name('index');
        Route::get('/create', [ReleasesController::class, 'create'])->name('create');
        Route::post('/store', [ReleasesController::class, 'store'])->name('store');
    });
    Route::group([
        'prefix' => 'employees',
        'as' => 'employees.',
    ], function () {
        Route::get('/', [EmployeesController::class, 'index'])->name('index');
        Route::get('/create', [EmployeesController::class, 'create'])->name('create');
        Route::post('/store', [EmployeesController::class, 'store'])->name('store');
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
