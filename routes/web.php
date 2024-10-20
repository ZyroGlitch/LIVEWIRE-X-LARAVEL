<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AuthComponent\SignIn;
use App\Livewire\AuthComponent\SignUp;
use App\Livewire\PageComponent\Orders;
use App\Livewire\PageComponent\Product;
use App\Livewire\PageComponent\Customer;
use App\Http\Controllers\LogoutController;

Route::get('/', SignIn::class)
->name('livewire.signIn');

Route::get('/forgotPassword', SignIn::class)
->name('livewire.forgotPassword');

Route::get('/signUp', SignUp::class)
->name('livewire.signUp');

Route::middleware('customer')->group(function () {
    Route::get('/product', Product::class)
    ->name('livewire.product');

    Route::get('/signOut', [LogoutController::class,'logout'])
    ->name('view.signOut');

    Route::get('/orders', Orders::class)
    ->name('livewire.orders');

    Route::get('/customer', Customer::class)
    ->name('livewire.customer');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';