<div class="container-fluid bg-dark text-light py-4 h-100" style="min-height: 100vh;">

    <select id="filterHistory" class="form-select ms-4" style="width:200px;">
        <option value="All" {{ request('filter') == 'All' ? 'selected' : '' }}>All</option>
        <option value="Shirt" {{ request('filter') == 'Shirt' ? 'selected' : '' }}>Shirt</option>
        <option value="Shoes" {{ request('filter') == 'Shoes' ? 'selected' : '' }}>Shoes</option>
    </select>

    <div class="grid-container h-100" style="min-height: 80vh;">
        @foreach ($items as $item)
            <div class="card shadow-sm">
                <div class="card-header bg-light text-center">
                    <img src="{{ Storage::url($item->image) }}" alt="img" class="object-fit-contain"
                        style="width:200px;height:200px;">
                </div>

                <div class="card-body">
                    <form action="{{ route('product.view') }}" method='post'>
                        @csrf

                        <input type="hidden" value="{{ $item->name }}" name="product_name">

                        <h2>{{ $item->name }}</h2>
                        <p class="mb-4">{{ Str::words($item->description, 25) }}</p>
                        <div class="d-flex justify-content-between align-items-center fs-4">
                            <p>${{ $item->price }}</p>
                            <p>Stock Left : {{ $item->stock }}</p>
                        </div>

                        <div class="d-grid">
                            <input type="submit" value="BUY" class="btn btn-dark">
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Select Filter Product --}}
<script>
    var filterHistory = document.getElementById('filterHistory');

    filterHistory.addEventListener('change', function() {
        var selectedValue = filterHistory.value;
        window.location.href = '{{ route('livewire.product') }}?filter=' + selectedValue;
    });
</script>
