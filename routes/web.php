<?php

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
    dd(Route::getRoutes()->getPrefix('admin'));
    return view('dashboard.dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => [
        'auth',
        'check.access',
    ],
], function () {
    Route::group([
        'prefix' => 'warehouse',
        'as' => 'warehouse.',
    ], function () {
        Route::get('/', 'Dashboard\DashboardController@index')->name('index');
    });
});
