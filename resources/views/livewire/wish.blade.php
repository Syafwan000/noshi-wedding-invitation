<div class="container wish py-5">
    <h3 class="text-center">Say Something</h3>
    <div class="wish-wrapper mt-4">
        <form wire:submit.prevent="sendWish">
            @if(session()->has('thanks'))
                <div class="feedback text-center py-2 mb-3">
                    <i class="fa-solid fa-circle-check pe-2"></i>{{ session('thanks') }}
                </div>
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" wire:model="name" class="form-control shadow-none" id="name" placeholder="Your Name" autocomplete="off" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea wire:model="message" class="form-control shadow-none" id="message" placeholder="Give a hope or something" rows="4" required></textarea>
            </div>
            <div class="mt-4 text-center">
                <button class="btn-send">Send<i class="fa-solid fa-arrow-right ps-2"></i></button>
            </div>
        </form>
    </div>
</div>