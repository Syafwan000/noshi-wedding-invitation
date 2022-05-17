<div class="pb-3 mb-2" x-data="{ create: false }">
    <a x-on:click="create = !create" href="#" class="btn-invite"><i class="fa-solid fa-circle-plus pe-2"></i>Invite</a>
    <form wire:submit.prevent="addInvite">
        <div x-show="create" class="create-form">
            <div class="d-flex">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control shadow-none" id="name" placeholder="Name" autocomplete="off" wire:model="name" required>
                </div>
                <div class="mb-3 ms-4">
                    <label for="Quota" class="form-label">Quota</label>
                    <input type="number" class="form-control shadow-none" id="Quota" placeholder="Quota" wire:model="quota" required>
                </div>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
        </div>
    </form>
</div>