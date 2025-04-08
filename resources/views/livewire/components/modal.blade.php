<div wire:ignore.self class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id . 'Label' }}" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            @switch($type)
                @case('guestbook')
                    <div class="modal-body">
                        <div class="column-wrapper mb-3">
                            <h4 class="mb-1 fs-6">Name</h4>
                            <p>{{ $data->name }}</p>
                        </div>
                        <div class="column-wrapper mb-3">
                            <h4 class="mb-1 fs-6">Timestamp</h4>
                            <p>{{ $data->created_at }}</p>
                        </div>
                        <div class="column-wrapper">
                            <h4 class="mb-1 fs-6">Message</h4>
                            <p>{{ $data->message }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    @break
                @case('add-invitation')
                    <form wire:submit.prevent="addInvitation">
                        <div class="modal-body">
                            <div class="column-wrapper mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input wire:model="name" type="text" class="form-control mb-1" id="name" placeholder="Insert name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="column-wrapper">
                                <label for="quota" class="form-label">Quota</label>
                                <input wire:model="quota" type="number" class="form-control mb-1" id="quota" min="1" placeholder="Insert quota">
                                @error('quota')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">
                                <span wire:loading.class="d-none">Add New</span>
                                <span wire:loading.class="d-block" wire:loading.class.remove="d-none" class="d-none">Adding...</span>
                            </button>
                        </div>
                    </form>
                    @break
                @case('edit-invitation')
                    <form wire:submit.prevent="editInvitation({{ $data->id }})">
                        <div class="modal-body">
                            <div class="column-wrapper mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input wire:model="name" type="text" class="form-control mb-1" id="name" placeholder="Edit name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="column-wrapper">
                                <label for="quota" class="form-label">Quota</label>
                                <input wire:model="quota" type="number" class="form-control mb-1" id="quota" min="1" placeholder="Edit quota">
                                @error('quota')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">
                                <span wire:loading.class="d-none">Edit</span>
                                <span wire:loading.class="d-block" wire:loading.class.remove="d-none" class="d-none">Editing...</span>
                            </button>
                        </div>
                    </form>
                    @break
                @case('delete-invitation')
                    <div class="modal-body">
                        <p class="mb-0">Are you sure you want to delete the invitation named <strong>{{ $data->name }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button wire:click="deleteInvitation({{ $data->id }})" type="button" class="btn btn-danger">Delete</button>
                    </div>
                    @break
            @endswitch
        </div>
    </div>
</div>

@script
<script>
    $wire.on('close-modal', () => {
        const body = document.querySelector('body')
        const backdrop = document.querySelector('.modal-backdrop')
        const modal = document.querySelector('.modal.show')

        body.style.removeProperty('padding-right')
        body.style.removeProperty('overflow')
        body.classList.remove('modal-open')
        if (modal) modal.style.display = 'none'
        if (backdrop) backdrop.remove()
    })
</script>
@endscript
