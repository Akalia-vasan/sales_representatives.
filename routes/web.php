<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleRepresentativ\SaleRepresentativController;
use App\Http\Controllers\SaleRepresentativ\SaleRepresentativTableController;
use App\Http\Controllers\Auth\VerificationController;
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

Route::get('/task', function () {
    return view('welcome');
});

Auth::routes(['logout' => false,
'verify' => true]);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'auth',
    'as' => 'admin.auth.',
    'namespace' => 'Auth',
    'middleware' => 'auth',
], function () {
    Route::group(['namespace' => 'Representativ'], function () {
        // For DataTables
        Route::post('representativ/get', [SaleRepresentativTableController::class, 'invoke'])->name('representativ.get');


        // representativ CRUD
        Route::get('representativ', [SaleRepresentativController::class, 'index'])->name('representativ.index');
        Route::get('representativ/create', [SaleRepresentativController::class, 'create'])->name('representativ.create');
        Route::post('representativ', [SaleRepresentativController::class, 'store'])->name('representativ.store');
        Route::group(['prefix' => 'representativ/{representativ}'], function () {
            Route::get('/edit', [SaleRepresentativController::class, 'edit'])->name('representativ.edit');
            Route::patch('/edit', [SaleRepresentativController::class, 'update'])->name('representativ.update');
            Route::delete('/delete', [SaleRepresentativController::class, 'destroy'])->name('representativ.destroy');
            Route::get('/show', [SaleRepresentativController::class, 'show'])->name('representativ.show');

        });
    });

});