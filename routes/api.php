<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\staff\StaffController;

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


Route::post('/login', [MainController::class, 'loginform'])->name('auth.login');
Route::post('/register', [MainController::class, 'registerform'])->name('auth.reg');

Route::get('/available-items', [MainController::class, 'getAvailableItems']);
Route::post('/single-item', [MainController::class, 'getSingleItem']);
Route::post('/add-to-cart', [MainController::class, 'addToCart']);
Route::post('/add-to-rent', [MainController::class, 'addToRent']);

Route::post('/user-info', [MainController::class, 'getUserInfo']);
Route::post('/update-profile', [MainController::class, 'updateProfile']);

Route::get('/user-orders', [MainController::class, 'getUserOrders']);
Route::post('/order-detail', [MainController::class, 'getOrderDetail']);
Route::post('/all-transactions', [MainController::class, 'getAllTransactions']);
Route::post('/update-order-status', [MainController::class, 'updateOrderStatus']);

Route::get('/all-rents', [MainController::class, 'getAllRents']);
Route::post('/return-rent', [MainController::class, 'returnRent']);

Route::get('/get-cart', [MainController::class, 'getCart']);
Route::delete('/delete-cart', [MainController::class, 'deleteCart']);
Route::get('/get-cart-item', [MainController::class, 'getCartItem']);
Route::patch('/update-cart', [MainController::class, 'updateCart']);
Route::post('/confirm-order', [MainController::class, 'confirmOrder']);


Route::post('/getInfoProd', [StaffController::class, 'getInfoProd']);
Route::post('/updateProd', [StaffController::class, 'updateProd']);
Route::post('/delItem', [StaffController::class, 'delItem']);
Route::post('/addproduct', [StaffController::class, 'addProd']);


Route::get('/getAllAccounts', [StaffController::class, 'getAllAccounts']);
Route::post('/getAccount', [StaffController::class, 'getAccount']);
Route::post('/updateUser', [StaffController::class, 'updateUser']);

