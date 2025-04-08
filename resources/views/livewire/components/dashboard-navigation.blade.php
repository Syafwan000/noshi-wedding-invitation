<div class="navigation-admin sticky-top shadow-sm">
    <div class="nav-info py-2 px-4">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="NoShi">
            <p class="m-0">Welcome back, {{ auth()->user()->username }}</p>
        </div>
        <button wire:click="signout" type="button" class="btn-logout">
            <i class="fa-solid fa-right-from-bracket"></i>
        </button>
    </div>
    <div class="nav-tabs">
        <a href="{{ route('admin.guestbook') }}" wire:navigate wire:current="active">
            <i class="fa-brands fa-gratipay"></i>
            Guestbook
        </a>
        <a href="{{ route('admin.invitation') }}" wire:navigate wire:current="active">
            <i class="fa-solid fa-envelope-open-text"></i>
            Invitation
        </a>
        <a href="{{ route('admin.scan') }}" wire:navigate wire:current="active">
            <i class="fa-solid fa-qrcode"></i>
            QR Scan
        </a>
    </div>
</div>
