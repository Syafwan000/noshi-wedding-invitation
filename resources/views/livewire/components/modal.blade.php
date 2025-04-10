<div wire:ignore.self class="modal fade" id="{{ $id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="{{ $id . 'Label' }}" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
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
                        <p class="mb-0">Are you sure you want to delete the invitation named <strong>{{ $data->name }}</strong> ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button wire:click="deleteInvitation({{ $data->id }})" type="button" class="btn btn-danger">Delete</button>
                    </div>
                    @break
                @case('attendance')
                    <div class="modal-body">
                        <div class="mt-3 text-center">
                            @if(!$maximumQuota)
                                <h3 class="m-0"><strong>{{ $data->name ?? 'Name' }}</strong></h3>
                                <h5>Presence The Event</h5>
                                <p>{{ $timeAttend }}</p>
                                <img width="150" src="{{ asset('img/success.gif') }}" alt="Success">
                            @else
                                <h3><strong>Maximum Quota Reached</strong></h3>
                                <h5>Your invitation quota has maximum quota reached</h5>
                                <p>Quota {{ $data->attendance }}/{{ $data->quota }}</p>
                                <img width="200" src="{{ asset('img/failed.gif') }}" alt="Failed">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="closeAttendanceModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    @break
            @endswitch
        </div>
    </div>
</div>

@script
<script>
    $wire.on('open-modal', () => {
        const modal = document.getElementById('{{ $id }}');
        const bootstrapModal = new bootstrap.Modal(modal);

        bootstrapModal.show();
    })

    $wire.on('close-modal', () => {
        const modal = document.getElementById('{{ $id }}');
        const bootstrapModal = bootstrap.Modal.getInstance(modal);

        if (bootstrapModal) {
            bootstrapModal.hide();
        }
    })
</script>
@endscript
