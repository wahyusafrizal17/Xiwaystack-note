<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

    Route::resource('users', 'App\Http\Controllers\UsersController');
    Route::post('users/delete', 'App\Http\Controllers\UsersController@delete')->name('users.delete');

    Route::resource('jokis', App\Http\Controllers\JokiController::class);
    Route::get('jokis/{joki}/whatsapp', [App\Http\Controllers\JokiController::class, 'whatsapp'])->name('jokis.whatsapp');
    
    Route::resource('bank-accounts', App\Http\Controllers\BankAccountController::class);
    Route::resource('expenses', App\Http\Controllers\ExpenseController::class);
});