<?php

namespace App\Livewire\PageComponent;

use App\Models\Product;
use Livewire\Component;

class CustomerDashboard extends Component
{
    public function render()
    {
         // Get the filter from the query parameter
        $filter = request('filter');

        // Apply filtering based on the selected filter value
        if ($filter && $filter !== 'All') {
            $items = Product::where('category', $filter)->get();
        }else{
            $items = Product::all();
        }

        return view('livewire.page-component.customer-dashboard',
        compact('items'));
    }
}