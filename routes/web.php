<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\WebControllers\UserController;
use App\Http\Controllers\WebControllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::get('test', function(){
//     $order = App\Models\Order::find(2);
//     // return $order->orderItems;

//     $box = App\Models\Box::find(1);
//     // return $box->boxItems;

//     $user = App\Models\User::find(2);
//     // return $user->orders;


//     $user = App\Models\User::find(3);
//     // return $user->appointments;
//     // return $user->boxes;
//     // return $user->orders;

//     $product = App\Models\Product::find(3);
//     // return $product->orderItems;
// });



Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.home');
    Route::get('/admin/products', function () { return view('admin.manageP');})->name('admin.products');
    Route::get('/admin/users', function () {  return view('admin.manageU');})->name('admin.users');
    Route::get('/admin/orders', function () { return view('admin.manageO');})->name('admin.orders');
    Route::get('/admin/appointments', function () { return view('admin.manageA');})->name('admin.appointments');
});

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'store']);
});

Route::post('/admin/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
