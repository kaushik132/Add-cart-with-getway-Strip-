<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Api\ApiController;
 
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('country', [ApiController::class, 'country']); 


Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
 
Route::get('/', [ProductsController::class, 'index']);
Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
Route::get('buy', [ProductsController::class, 'buy'])->name('buy');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');

Route::get('/image', [ProductsController::class, 'image']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminhome'])->name('admin.home')->middleware('is_admin');

// socilite logins urls
Route::get('/googleLogin', [HomeController::class, 'googleLogin']);
Route::get('/newpage', [HomeController::class, 'page']);










