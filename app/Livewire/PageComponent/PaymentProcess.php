<?php

namespace App\Livewire\PageComponent;

use App\Models\Product;
use Livewire\Component;

class PaymentProcess extends Component
{
    public $products;
    public $quantity;
    public $image = '';

    public function mount(){
        $this->products = Product::where('productID',request('productID'))->first();

        $this->quantity = request('quantity');
    }
    
    public function render()
    {
        return view('livewire.page-component.payment-process',
        ['products' => $this->products, 'quantity' => $this->quantity]);
    }
}