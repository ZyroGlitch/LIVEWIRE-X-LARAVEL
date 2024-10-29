<div class="container-fluid bg-dark text-light h-100">
    <div class="d-flex justify-content-evenly align-items-center px-5">
        <div class="col-lg-6 col-md-6 text-center">
            <img src="{{ asset('assets/gcash.png') }}" alt="gcash" class="object-fit-cover">
        </div>
        <div class="col-lg-5 col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-light">
                    <h2>Scan Gcash QR CODE</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.orderProcess') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{ $products->productID }}" name="productID">
                        <input type="hidden" value="{{ $quantity }}" name="quantity">
                        <input type="hidden" value="{{ $products->price * $quantity }}" name="total_amount">

                        <h5 class="mb-2">Order Details</h5>
                        <div class="d-flex justify-content-between align-items-center fs-5">
                            <p>Product</p>
                            <p>{{ $products->name }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center fs-5">
                            <p>Quantity</p>
                            <p>x {{ $quantity }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center fs-5 mb-4">
                            <p>Total</p>
                            <p>${{ $products->price * $quantity }}</p>
                        </div>

                        <div class="shadow-sm mb-4">
                            <label for="formFile" class="form-label">Upload the proof of payment</label>
                            <input class="form-control" type="file" id="formFile" name="paymentImage">
                        </div>

                        {{-- <div>
                            @if (session('paymentImage'))
                                <div class="mb-3">
                                    <img src="{{ session('paymentImage')->temporaryUrl() }}" alt="Preview Image"
                                        class="object-fit-contain" style="width:100px;height:100px;">
                                </div>
                            @endif
                        </div> --}}


                        <div class="d-grid">
                            <input type="submit" class="btn btn-dark" value="BUY" name="buyBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
