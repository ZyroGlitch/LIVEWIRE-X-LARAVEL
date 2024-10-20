<?php

namespace App\Livewire\PageComponent;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Product extends Component
{   
    public function render()
    {
        return view('livewire.page-component.product');
    }
}