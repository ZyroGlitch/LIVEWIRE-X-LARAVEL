<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AuthComponent\SignIn;
use App\Livewire\AuthComponent\SignUp;
use App\Livewire\PageComponent\Orders;
use App\Livewire\PageComponent\Customer;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LogoutController;
use App\Livewire\PageComponent\ShowProduct;
use App\Livewire\PageComponent\PaymentProcess;
use App\Livewire\SuperAdminComponent\Customers;
use App\Livewire\SuperAdminComponent\Dashboard;
use App\Livewire\SuperAdminComponent\AddProduct;
use App\Livewire\PageComponent\CustomerDashboard;
use App\Livewire\SuperAdminComponent\Transaction;

Route::get('/', SignIn::class)
->name('livewire.signIn');

Route::get('/forgotPassword', SignIn::class)
->name('livewire.forgotPassword');

Route::get('/signUp', SignUp::class)
->name('livewire.signUp');


Route::middleware('customer')->group(function () {
    Route::get('/product', CustomerDashboard::class)
    ->name('livewire.product');

    Route::post('/product/view', ShowProduct::class)
    ->name('product.view');

    Route::post('/product/payment', PaymentProcess::class)
    ->name('product.payment');

    Route::post('/product/orderProcess', [OrderController::class,'store'])
    ->name('product.orderProcess');

    Route::get('/orders', Orders::class)
    ->name('livewire.orders');

    Route::get('/customer', Customer::class)
    ->name('livewire.customer');

    Route::get('/signOut', [LogoutController::class,'logout'])
    ->name('view.signOut');
});

Route::middleware('super-admin')->group(function () {
    Route::get('/admin-dashboard', Dashboard::class)
    ->name('admin.dashboard');

    Route::get('/admin-transaction', Transaction::class)
    ->name('admin.transaction');

    Route::get('/admin-customers', Customers::class)
    ->name('admin.customers');

    Route::get('/admin-addProduct', AddProduct::class)
    ->name('admin.addProduct');

    Route::get('/admin-signout', [LogoutController::class,'signout'])
    ->name('admin.signout');
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