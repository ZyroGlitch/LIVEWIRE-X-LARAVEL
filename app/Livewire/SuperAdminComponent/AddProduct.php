<?php

namespace App\Livewire\SuperAdminComponent;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name = '';
    public $price = '';
    public $stock = '';
    public $category = '';
    public $description = '';
    public $image = '';

   public function store()
{
    $uploadImage = null;

    if ($this->image) {
        // Generate a unique name for the image
        $imageName = time() . '.' . $this->image->extension();

        // Store the image in the 'public/uploads' directory
        $uploadImage = $this->image->storeAs('uploads', $imageName, 'public');

        // Set $imagePath to the relative path to the image for storing in the database
        $imagePath = 'uploads/' . $imageName;
    }

    $store = Product::create([
        'name' => $this->name,
        'price' => $this->price,
        'stock' => $this->stock,
        'category' => $this->category,
        'description' => $this->description,
        'image' => $imagePath,
    ]);

    if ($store) {
        session()->flash('success', 'Product Added Successfully.');
    } else {
        session()->flash('error', "Can't Add Product!");
    }
}



    public function render()
    {
        return view('livewire.super-admin-component.add-product');
    }
}