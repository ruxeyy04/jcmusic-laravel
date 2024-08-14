<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\staff\StaffController;
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

Route::get('/login',[MainController::class, 'login'])->name('login');
// Client Side
Route::get('/',[MainController::class, 'homepage'])->name('home');
Route::get('/about',[MainController::class, 'aboutpage'])->name('about');
Route::get('/viewproducts',[MainController::class, 'viewproducts'])->name('viewproducts');
Route::get('/orders',[MainController::class, 'orders'])->name('orders');
Route::get('/rents',[MainController::class, 'rents'])->name('rents');
Route::get('/cart',[MainController::class, 'cart'])->name('cart');
Route::get('/profile',[MainController::class, 'profile'])->name('profile');
// =============

// Admin Side
Route::get('/admin',[StaffController::class, 'indexpage'])->name('admin.home');
Route::get('/admin/aboutpage',[StaffController::class, 'aboutpage'])->name('admin.aboutpage');
Route::get('/admin/accountpage',[StaffController::class, 'accountpage'])->name('admin.accountpage');
Route::get('/admin/addproductspage',[StaffController::class, 'addproductspage'])->name('admin.addproductspage');
Route::get('/admin/modproducts',[StaffController::class, 'modproducts'])->name('admin.modproducts');
Route::get('/admin/profilepage',[StaffController::class, 'profilepage'])->name('admin.profilepage');
Route::get('/admin/rentpage',[StaffController::class, 'rentpage'])->name('admin.rentpage');
Route::get('/admin/transactionpage',[StaffController::class, 'transactionpage'])->name('admin.transactionpage');
Route::get('/admin/viewproductspage',[StaffController::class, 'viewproductspage'])->name('admin.viewproductspage');


// Inhcarge Side
Route::get('/incharge',[StaffController::class, 'inchargeindexpage'])->name('incharge.home');
Route::get('/incharge/aboutpage',[StaffController::class, 'inchargeaboutpage'])->name('incharge.aboutpage');
Route::get('/incharge/profilepage',[StaffController::class, 'inchargeprofilepage'])->name('incharge.profilepage');
Route::get('/incharge/rentpage',[StaffController::class, 'inchargerentpage'])->name('incharge.rentpage');
Route::get('/incharge/transactionpage',[StaffController::class, 'inchargetransactionpage'])->name('incharge.transactionpage');