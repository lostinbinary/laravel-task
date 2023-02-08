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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('My Orders');
Route::get('/order/{id}/adduser', [App\Http\Controllers\OrderController::class, 'adduser']);
Route::get('/create-order', [App\Http\Controllers\OrderController::class, 'create'])->name('My Orders');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('Cart');
Route::get('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'add']);

Route::get('/invites', [App\Http\Controllers\InviteController::class, 'index']);
Route::get('/invite/{order_id}/add/{user_id}', [App\Http\Controllers\InviteController::class, 'create']);
Route::get('/invite/{invite_id}/accept/{status}', [App\Http\Controllers\InviteController::class, 'accept']);

Route::get('/pay/{order_id}/{price}', [App\Http\Controllers\PaymentController::class, 'pay']);
