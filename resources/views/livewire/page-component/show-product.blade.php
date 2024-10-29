<div class="container-fluid bg-dark text-light h-100">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-8 col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a wire:navigate href="{{ route('livewire.product') }}"
                            class="text-light fw-bold" style="text-decoration: none">Home</a>
                    </li>
                    <li class="breadcrumb-item text-light fw-semibold active" aria-current="page">Library</li>
                </ol>
            </nav>
            <div class="card shadow-sm">
                <div class="card-body text-light d-flex align-items-stretch p-0">
                    <div class="col-lg-6 col-md-6 text-center">
                        <img src="{{ Storage::url($getProductID->image) }}" alt="{{ $getProductID->name }}"
                            class="object-fit-contain" style="width:350px;height:350px;">
                    </div>
                    <div class="col-lg-6 col-md-6 bg-dark text-light p-3">
                        <form action="{{ route('product.payment') }}" method="post">
                            @csrf
                            @method('post')

                            <input type="hidden" value="{{ $getProductID->productID }}" name="productID">

                            <h2>{{ $getProductID->name }}</h2>
                            <p class="mb-4">{{ $getProductID->description }}</p>
                            <div class="d-flex justify-content-between align-items-center fs-4">
                                <p>${{ $getProductID->price }}</p>
                                <p>Stock Left : {{ $getProductID->stock }}</p>
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" required value="1"
                                    name="quantity">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-light fw-bold"><i class="bi bi-bag-fill"></i>
                                    BUY</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                text: '{{ session('message') }}',
            });
        });
    </script>
@endif
