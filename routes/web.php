<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\http\Controllers\GoogleController;
use App\Http\Controllers\AddressController;

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

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::get('/address', [AddressController::class, 'showAddressForm'])->name('address.show');

Route::post('/address/update', [AddressController::class, 'updateAddress'])->name('address.update');

route::get('auth/google',[GoogleController::class,'googlepage']);

route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');

route::get('/view_category',[AdminController::class,'view_category']);

route::post('/add_category',[AdminController::class,'add_category']);

route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);


route::get('/order',[AdminController::class,'order']);

route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

route::get('/send_email/{id}',[AdminController::class,'send_email']);

route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

route::get('/search',[AdminController::class,'searchdata']);

Route::get('packed/{id}', [AdminController::class, 'markAsPacked'])->name('packed');

Route::get('shipped/{id}', [AdminController::class, 'markAsShipped'])->name('shipped');

Route::get('delivered/{id}', [AdminController::class, 'markAsDelivered'])->name('delivered');

route::get('/contact',[HomeController::class,'contact']);














route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::get('/product_details/{id}',[HomeController::class,'product_details']);

route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order',[HomeController::class,'cash_order']);

route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);




Route::post('stripe/{totalprice}',[HomeController::class, 'stripePost'])->name('stripe.post');

route::get('/show_order',[HomeController::class,'show_order']);

route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

route::get('/product_search',[HomeController::class,'product_search']);

route::get('/products',[HomeController::class,'product']);

route::get('/search_product',[HomeController::class,'search_product']);