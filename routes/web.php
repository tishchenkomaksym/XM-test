<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\CompanyController;
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


Route::get('/history', [ HistoryController::class, 'index'])->name('history');
Route::get('/chart-prices', [ ChartController::class, 'index'])->name('chart.prices');
Route::group( [
    'prefix'    => 'companies',
    'as'        => 'companies.',
], function () {
    Route::get( '/', [CompanyController::class, 'index'])->name( 'index' );
    Route::get( '/show/{company}', [CompanyController::class, 'show'] )->name('show');
    Route::get( '/create', [CompanyController::class, 'create'] )->name( 'create' );
    Route::post( '/store', [CompanyController::class, 'store'] )->name( 'store' );
//    Route::get( '/{category}/edit', 'CategoryController@edit' )->name( 'edit' );
//    Route::put( '/{category}/update', 'CategoryController@update' )->name( 'update' );
//    Route::delete( '/{category}/delete', 'CategoryController@destroy' )->name( 'delete' );
});


