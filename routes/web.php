<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\CompanyRegistryController;
use App\Http\Controllers\HistoryController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/chart-prices', [ ChartController::class, 'index'])->name('chart.prices');
Route::group( [
    'prefix'    => 'companies',
    'as'        => 'companies.',
], function () {
    Route::get( '/', [CompanyRegistryController::class, 'index'])->name( 'index' );
    Route::get( '/create', [CompanyRegistryController::class, 'create'] )->name( 'create' );
    Route::post( '/show', [CompanyRegistryController::class, 'request'] )->name( 'show' );
});


