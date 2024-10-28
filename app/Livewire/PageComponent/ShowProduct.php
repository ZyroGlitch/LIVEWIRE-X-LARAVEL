<?php

namespace App\Livewire\PageComponent;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ShowProduct extends Component
{
    public $getProductID;
    public $productID;
    public $quantity;

    public function store(){
        $store = Order::create([
                    'userID' => Session::get('userID'),
                    'productID' => $this->productID,
                    'mode_of_payment' => 'Online Payment'
                ]);
        
        if(is_null($store)){
            session()->flash('error','Order Failed!');
        }

        
    }
    
    public function render()
    {
        $this->getProductID = Product::where('name',request('product_name'))
        ->first();

        return view('livewire.page-component.show-product',['getProductID' => $this->getProductID]);
    }
}