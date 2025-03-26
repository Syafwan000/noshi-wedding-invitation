<div class="guestbook container py-5">
    <h3 class="text-center">Say Something</h3>
    @if (session()->has('success'))
        <div class="flash-message success">
            <p>{{ session('success') }}</p>
        </div>
    @elseif (session()->has('error'))
        <div class="flash-message danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="mt-4">
        <form wire:submit.prevent="submit">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" wire:model="name" class="form-control shadow-none" id="name" placeholder="Your Name" autocomplete="off">
                @error('name')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea wire:model="message" class="form-control shadow-none" id="message" placeholder="Give a message" rows="4"></textarea>
                @error('message')
                    <p class="text-danger mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 text-center">
                <button class="btn-send">
                    <span wire:target="submit" wire:loading.class="d-block" wire:loading.class.remove="d-none" class="d-none">
                        Sending...
                    </span>
                    <span wire:target="submit" wire:loading.class="d-none">
                        Send
                        <i class="fa-solid fa-arrow-right ps-2"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
