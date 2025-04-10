@extends('layouts.layout-invitation')

@section('content')
    <div class="invitation-ticket container-fluid text-center">
        <div class="invitation-ticket-wrapper">
            <h1 class="mb-3 pt-5">Hello, {{ $invitation->name }}</h1>
            <p>You're invited to Nobita & Shizuka's Wedding</p>
            <div class="qr-code py-3">
                {!! QrCode::size(170)->generate($invitation->identifier) !!}
            </div>
            <livewire:components.quota-indicator :identifier="$invitation->identifier" />
            <p class="attention-text mb-0">Scan this QR Code before enter the building</p>
            <div class="thanks text-center pb-5">
                <p class="thanks-japan mb-1">ありがとうございました</p>
                <p class="thanks-english">Thank You</p>
            </div>
        </div>
    </div>
@endsection
