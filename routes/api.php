<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Enquiry
Route::resource('enquiry', 'Api\EnquirySalesController')->only([
    'store'
]);

// Enquiry
Route::resource('dataimt', 'Api\DataIMTController')->only([
    'store', 'update'
]);

// User
Route::resource('login', 'Api\Auth\AuthController')->only([
    'store'
]);

Route::resource('registerusers', 'Api\Auth\RegisterUserController')->only([
    'store'
]);

Route::resource('transaction', 'Api\TransactionController')->only([
    'index', 'store'
]);

Route::resource('attachmenttransaction', 'Api\AttachmentTransactionController')->only([
    'store'
]);

Route::resource('listmutation', 'Api\ListMutationController')->only([
    'store'
]);