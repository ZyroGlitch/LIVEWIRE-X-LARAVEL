<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-lg-5 col-md-5">
        <div class="card bg-dark text-light shadow-sm">
            <div class="card-body">
                <form wire:submit='check' method="post">
                    @csrf

                    <div class="text-center mb-3">
                        <img src="assets/livewire.png" alt="Logo" class="object-fit-contain"
                            style="width:150px;height:150px;">
                        <h2 class="fw-bold">Laravel x Livewire</h2>
                    </div>

                    <!-- Email Field -->
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                        <input type="email" class="form-control" id="email" required wire:model='email'>
                    </div>

                    <!-- Password Field with Show/Hide Toggle -->
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password" required wire:model='password'>
                        <span class="input-group-text">
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                        </span>
                    </div>

                    <div class="text-end mb-4">
                        <a wire:navigate class="fw-semibold links" style="text-decoration: none;cursor:pointer;"
                            data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot
                            Password?</a>
                    </div>

                    <div class="d-grid mb-3">
                        <input type="submit" value="Sign In" class="btn btn-primary fw-bold">
                    </div>

                    <div class="text-center fw-semibold">
                        <p>Don't have an account? <a wire:navigate href="{{ route('livewire.signUp') }}" class="links"
                                style="text-decoration: none">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Forgot Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit='resetPass' method="post">
                        @csrf

                        <label for="resetEmail" class="form-label">Enter your email</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                            <input type="email" class="form-control" id="resetEmail" required wire:model='resetEmail'>
                        </div>

                        <!-- New Password Field with Show/Hide Toggle -->
                        <label for="newPassword" class="form-label">Enter new password</label>
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                            <input type="password" class="form-control" id="newPassword" required
                                wire:model='newPassword'>
                            <span class="input-group-text">
                                <i class="bi bi-eye-slash" id="toggleNewPassword" style="cursor: pointer;"></i>
                            </span>
                        </div>

                        <div class="d-flex justify-content-end align-items-center gap-2">
                            <div class="col-lg-3 col-md-4">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message Handling -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    text: '{{ session('message') }}',
                });
            });
        </script>
    @endif

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

</div>

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
