<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    use WithFileUploads;
    
    public function store(){

        if (request('paymentImage')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . request('paymentImage')->extension();

            // Store the image in the 'public/uploads' directory
            request('paymentImage')->storeAs('proof_of_payments', $imageName, 'public');

            // Set $imagePath to the relative path to the image for storing in the database
            $imagePath = 'uploads/' . $imageName;
        }

        $store = Order::create([
            'userID' => Session::get('userID'),
            'productID' => request('productID'),
            'quantity' => request('quantity'),
            'total_amount' => request('total_amount'),
            'mode_of_payment' => 'Gcash',
            'proof_of_payment' => $imagePath,
        ]);

        if ($store) {
            session()->flash('success', 'Order Successfully.');
        } else {
            session()->flash('error', "Order Process Failed!");
        }

        return redirect()->route('livewire.product');

    }
}