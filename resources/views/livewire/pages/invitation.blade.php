<div class="admin-page container py-5">
    <div class="header-wrapper">
        <div class="title-wrapper">
            <h3>Invitation</h3>
            <p>{{ $total }} Invitation (Overall)</p>
        </div>
        <div class="action-wrapper">
            <div class="d-flex gap-1 flex-wrap">
                <button wire:click="refresh" class="btn btn-warning">Refresh</button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInvitation">Add Invitation</button>
            </div>
            <livewire:components.modal
                type="add-invitation"
                title="Add Invitation"
                id="addInvitation" />
            <input wire:model.live="search" type="text" class="form-control w-100" placeholder="Search Keyword...">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Identifier</th>
                    <th scope="col">Quota</th>
                    <th scope="col">Attendance</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @if($invitations->count())
                    @foreach ($invitations as $invitation)
                        <tr wire:key="invitation-{{ $invitation->id }}">
                            <td scope="row">{{ $invitations->firstItem() + $loop->index }}</td>
                            <td>{{ $invitation->name }}</td>
                            <td>{{ $invitation->identifier }}</td>
                            <td>{{ $invitation->quota }}</td>
                            <td class="@if($invitation->attendance == $invitation->quota)
                                    text-danger
                                @else
                                    text-success
                                @endif
                            ">
                                <strong>
                                    {{ $invitation->attendance }}/{{ $invitation->quota }}
                                    @if($invitation->attendance == $invitation->quota)
                                        (MAX)
                                    @endif
                                </strong>
                            </td>
                            <td class="d-flex gap-1 flex-wrap">
                                <a href="{{ route('ticket', $invitation->identifier) }}" target="_blank" class="btn btn-primary">Ticket</a>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#invitationEdit{{ $invitation->id }}">Edit</button>
                                <livewire:components.modal
                                    type="edit-invitation"
                                    title="Edit Invitation"
                                    :id="'invitationEdit' . $invitation->id"
                                    :key="'invitationEdit' . $invitation->id"
                                    :data="$invitation" />
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#invitationDelete{{ $invitation->id }}">Delete</button>
                                <livewire:components.modal
                                    type="delete-invitation"
                                    title="Delete Invitation"
                                    :id="'invitationDelete' . $invitation->id"
                                    :key="'invitationDelete' . $invitation->id"
                                    :data="$invitation" />
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5"><strong><i class="fa-brands fa-bilibili pe-2"></i>Empty</strong></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{ $invitations->links() }}
</div>
