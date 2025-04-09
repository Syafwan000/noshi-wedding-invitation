<div class="admin-page container py-5">
    <div class="header-wrapper">
        <div class="title-wrapper">
            <h3>QR Scan</h3>
            <p>Scan the QR code before entering the building.</p>
        </div>
    </div>
    <div wire:ignore id="reader"></div>
    <livewire:components.modal
        type="attendance"
        title="Attendance"
        id="attendance" />
</div>

@script
<script>
    const onScanSuccess = (decodedText) => Livewire.dispatch('attendance', { identifier: decodedText })
    let scanner = new Html5QrcodeScanner(
        'reader',
        { fps: 10, qrbox: 300 }
    )
    scanner.render(onScanSuccess)
</script>
@endscript
