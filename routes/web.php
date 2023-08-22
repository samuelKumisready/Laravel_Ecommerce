<?php

use App\Http\Controllers\userpagescontroller;
use App\Models\Packages;
use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     $packs = Packages::all();
//     return view('Landings.index', compact('packs'));
// });


    Route::get('/', [userpagescontroller::class, 'index' ])->name('home');
    Route::get('/alldatapackages', [userpagescontroller::class, 'allDataPackages' ])->name('allPackades');
    Route::get('/wishlist', [userpagescontroller::class, 'wishList' ])->name('wishlist');
    Route::post('/process-checkout', [userpagescontroller::class, 'processCheckout'])->name('processCheckout');
    Route::get('/cart', [userpagescontroller::class, 'cart' ])->name('cart');
    Route::get('/add-to-cart/{id}', [UserPagesController::class, 'addToCart'])->name('addToCart');
    Route::post('/add-to-cart-with-phone', [userpagescontroller::class, "addToCartWithPhone"])->name('addToCartWithPhone');
    Route::get('/remove-from-cart/{id}', [UserPagesController::class, 'removeFromCart'])->name('removeFromCart');
    Route::get('/clear-cart', [UserPagesController::class, 'clearCart'])->name('clearCart');
    Route::get('/checkout', [userpagescontroller::class, 'checkout' ])->name('checkout');
    Route::get('/login', [userpagescontroller::class, 'login' ])->name('login');
    Route::post('/login-user', [userpagescontroller::class, 'loginUsers' ])->name('loginUsers');
    Route::post('/logout-user', [userpagescontroller::class, 'logoutUser' ])->name('logoutUser');
    Route::get('/signup', [userpagescontroller::class, 'signup' ])->name('signup');
    Route::post('/register-user', [userpagescontroller::class, 'registerUser' ])->name('registerUser');
    Route::get('/profile', [userpagescontroller::class, 'profile' ])->name('profile');
    