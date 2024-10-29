<?php

namespace App\Livewire\PageComponent;

use App\Models\Product;
use Livewire\Component;


class ShowProduct extends Component
{
    public $getProductID;
    
    public function render()
    {
        $this->getProductID = Product::where('name',request('product_name'))
        ->first();

        return view('livewire.page-component.show-product',['getProductID' => $this->getProductID]);
    }
}