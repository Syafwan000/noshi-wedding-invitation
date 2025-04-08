<div class="admin-page container py-5">
    <div class="header-wrapper">
        <div class="title-wrapper">
            <h3>Invitation</h3>
            <p>{{ $total }} Messages</p>
        </div>
        <div class="action-wrapper">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addInvitation">Add Invitation</button>
            <livewire:components.modal
                type="add-invitation"
                title="Add Invitation"
                id="addInvitation" />
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
                            <td>{{ $invitation->attendance }}/{{ $invitation->quota }}</td>
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
