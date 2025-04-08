<div class="auth container-fluid">
    <h1>Admin Panel</h1>
    <p>Manage and control your digital invitation</p>
    @if (session()->has('error'))
        <div class="flash-message admin-alert danger">
            <p class="m-0">
                <i class="fa-solid fa-circle-xmark pe-2"></i>
                {{ session('error') }}
            </p>
        </div>
    @endif
    <form wire:submit.prevent="authenticate" class="auth-form">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input wire:model="username" type="text" class="form-control shadow-none" id="username" name="username" placeholder="Username" autocomplete="off">
            @error('username')
                <p class="text-danger admin-validation mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input wire:model="password" type="password" class="form-control shadow-none" id="password" name="password" placeholder="Password">
            @error('password')
                <p class="text-danger admin-validation mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn-auth">
                <span wire:target="authenticate" wire.loading.class="d-block" wire:loading.class.remove="d-none" class="d-none">Signing In...</span>
                <span wire:target="authenticate" wire:loading.class="d-none">Sign In</span>
            </button>
        </div>
    </form>
</div>
