<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\profileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
//controller admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BEBrandController;
use App\Http\Controllers\Admin\BEProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BEOrderController;



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

Route::get('/', [HomeController::class, 'Index'])->name('home');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/About', [HomeController::class, 'About'])->name('about');
Route::get('/Contact', [HomeController::class, 'Contact'])->name('contact');
Route::get('/Product', [ProductController::class, 'Index'])->name('product');
Route::get('/Product/Detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
Route::get('/Blog', [BlogController::class, 'Index'])->name('blog');
Route::group(['App\Http\Controllers\Auth' => ' User'], function () {
    Route::get('/Login', [LoginController::class, 'Login'])->name('login');
    route::post('/Login', [LoginController::class, 'Login_'])->name('login.action');

    Route::get('/Register', [RegisterController::class, 'Register'])->name('register');
    Route::post('/Register', [RegisterController::class, 'Register_'])->name('register.action');

    Route::post('/Logout', [LoginController::class, 'Logout'])->name('logout');

    Route::get('Forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
    Route::post('Forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.action');
    Route::get('Reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password');
    Route::post('Reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::get('/Profile', [ProfileController::class, 'profileShow'])->name('profile');
    Route::post('/Profile/edit/{id}', [ProfileController::class, 'profileEdit'])->name('profileEdit');
    Route::get('/Profile/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::post('/Profile/change-password', [ProfileController::class, 'changePasswordUpdate'])->name('changePasswordUpdate');

});
route::group(['cart' => ''], function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.show');
    Route::get('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
    Route::post('/cart/payment', [CartController::class, 'payment'])->name('cart.payment');
});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/Brand', [BEBrandController::class, 'index'])->name('brand.show');
    Route::post('/Brand', [BEBrandController::class, 'create'])->name('brand.create');
    Route::get('/Brand/Edit/{id}', [BEBrandController::class, 'edit'])->name('brand.edit');
    Route::post('/Brand/Edit/{id}', [BEBrandController::class, 'update'])->name('brand.update');
    Route::delete('/Brand/delete/{id}', [BEBrandController::class, 'delete'])->name('brand.delete');

    Route::get('/Product', [BEProductController::class, 'index'])->name('product.show');
    Route::post('/Product', [BEProductController::class, 'create'])->name('product.create');
    Route::get('/Product/Edit/{id}', [BEProductController::class, 'edit'])->name('product.edit');
    Route::post('/Product/Edit/{id}', [BEProductController::class, 'update'])->name('product.update');
    Route::delete('/Product/delete/{id}', [BEProductController::class, 'delete'])->name('product.delete');

    Route::get('/Slider', [SliderController::class, 'index'])->name('slider.show');
    Route::post('/Slider/{id}', [SliderController::class, 'update'])->name('slider.update');

    Route::get('/Order', [BEOrderController::class ,'index'])->name('order.show');
    Route::delete('/Order/delete/{id}', [BEOrderController::class ,'delete'])->name('order.delete');
    Route::get('/Order/detail/{id}', [BEOrderController::class ,'detail'])->name('order.detail');
});

