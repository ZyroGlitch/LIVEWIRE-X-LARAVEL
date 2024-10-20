<div class="container h-auto">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-11 col-md-11">
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-center align-items-stretch p-0">
                    <div class="col-lg-7 col-md-7 p-3">
                        <div class="d-flex align-items-center">
                            <img src="assets/livewire.png" alt="logo" class="object-fit-contain"
                                style="width:50px;height:50px;">
                            <h4 class="fw-bold">Laravel x Livewire</h4>
                        </div>
                        <div class="text-center">
                            <img src="assets/register.svg" alt="image" class="object-fit-contain"
                                style="width:450px;height:450px;">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 bg-dark text-light p-4">
                        <form wire:submit='store' method="post">
                            @csrf

                            <div class="text-center mb-4">
                                <h2>Get Started</h2>
                                <h6>Already have an account? <a wire:navigate href="{{ route('livewire.signIn') }}"
                                        class="links" style="text-decoration: none">Sign In</a>
                                </h6>
                            </div>

                            <label for="firstname" class="form-label">Firstname</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" id="firstname" required
                                    wire:model='firstname'>
                            </div>

                            <label for="lastname" class="form-label">Lastname</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" id="lastname" required
                                    wire:model='lastname'>
                            </div>

                            <label for="email" class="form-label">Email</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                                <input type="email" class="form-control" id="email" required wire:model='email'>
                            </div>

                            <!-- Password Field with Show/Hide Toggle -->
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                                <input type="password" class="form-control" id="password" required
                                    wire:model='password'>
                                <span class="input-group-text">
                                    <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-bold">Sign
                                    Up</button>
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

<!-- JavaScript to Toggle Password Visibility -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    const toggleNewPassword = document.querySelector('#toggleNewPassword');
    const newPassword = document.querySelector('#newPassword');

    toggleNewPassword.addEventListener('click', function() {
        // Toggle the type attribute
        const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        newPassword.setAttribute('type', type);

        // Toggle the icon
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>
