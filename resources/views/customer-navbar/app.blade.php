<nav class="navbar navbar-expand-lg bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="{{ route('livewire.product') }}" @class(['current' => request()->is('/')])
            wire:navigate>
            <img src="assets/livewire.png" alt="Logo" class="object-fit-contain" style="width:50px;height:50px;">
            Livewire x Laravel
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-5">
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold @if (request()->is('product')) current @endif"
                        href="{{ route('livewire.product') }}" @class(['current' => request()->is('/')]) wire:navigate><i
                            class="bi bi-boxes"></i>
                        Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold @if (request()->is('orders')) current @endif"
                        href="{{ route('livewire.orders') }}" @class(['current' => request()->is('/orders')]) wire:navigate>
                        <i class="bi bi-table"></i> Order History
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 fw-bold @if (request()->is('customer')) current @endif"
                        href="{{ route('livewire.customer') }}" @class(['current' => request()->is('/customer')]) wire:navigate><i
                            class="bi bi-people-fill"></i>
                        Customer</a>
                </li>
            </ul>

            <a wire:navigate href="{{ route('view.signOut') }}" class="fs-5 fw-bold logout"
                style="text-decoration: none">Logout</a>
        </div>
    </div>
</nav>
