<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name(Config::get('constants.LOGIN'));

    Route::get('/register', function () {
        return view('register');
    })->name(Config::get('constants.REGISTER'));

});


Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return redirect('/transaction');
    });

    Route::get('/transaction', 'TransactionController@index')->name(Config::get('constants.TRANSACTION'));
    Route::get('/mutation', 'MutationController@index')->name(Config::get('constants.MUTATION'));
    
    Route::get('logout', 'Api\Auth\AuthController@doLogout')->name(Config::get('constants.LOGOUT'));
});
