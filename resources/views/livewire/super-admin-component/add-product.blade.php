@extends('super-admin-navbar.app')

@section('page-content')
    <section class="container h-auto">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit='store' method="post" enctype="multipart/form-data">
            @csrf

            <div class="d-flex justify-content-between align-items-center">
                <div class="col-lg-10 col-md-10">
                    <div class="card bg-secondary text-light shadow-sm p-2">
                        <div class="card-body">
                            <h2 class="fw-bold mb-4">Add Product</h2>

                            <div class="d-flex align-items-center gap-5 mb-4">
                                <div class="w-100">
                                    <label for="product-name" class="form-label">Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="product-name" required
                                            wire:model='name'>
                                    </div>
                                </div>

                                <div class="w-100">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="price" required
                                            wire:model='price'>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center gap-5 mb-4">
                                <div class="w-100">
                                    <label for="stock" class="form-label">Stock</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="stock" required
                                            wire:model='stock'>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" wire:model='category' required>
                                        <option value="Shirt" selected>Shirt</option>
                                        <option value="Shoes">Shoes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-floating mb-4">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" required style="height: 100px"
                                    wire:model='description'></textarea>
                                <label for="floatingTextarea2" class="text-secondary">Description</label>
                            </div>

                            <div class="mb-4">
                                <label for="formFile" class="form-label">Insert an image</label>
                                <input class="form-control" type="file" id="formFile" required wire:model='image'>
                            </div>

                            @if ($image)
                                <div class="mb-4">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Preview Image" class="object-fit-contain"
                                        style="width:300px;height:300px;">
                                </div>
                            @endif


                            <button type="submit" class="btn btn-dark" style='width:380px;'>Add Product</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
