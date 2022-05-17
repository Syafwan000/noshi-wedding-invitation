@extends('apps.layout.index')

@section('content')

<div class="auth container-fluid">
    <h1>Apps Control</h1>
    <p>Control Your Invitation</p>
    <form class="auth-form" method="POST" action="/apps/auth">
        @csrf
        @if(session()->has('failed'))
            <div class="login-failed text-center py-2 mb-2" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                <i class="fa-solid fa-circle-xmark pe-2"></i>{{ session('failed') }}
            </div>
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Client Name</label>
            <input type="text" class="form-control shadow-none" id="name" name="name" placeholder="Client Name" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control shadow-none" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3 text-center">
            <button class="btn-auth">Log In</button>
        </div>
    </form>
</div>

@endsection