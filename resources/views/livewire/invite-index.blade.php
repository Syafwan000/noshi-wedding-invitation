<div class="container invite py-5">
    <h3><i class="fa-solid fa-envelope-open-text pe-2"></i>Invite</h3>
    <p>{{ $total_invite }} Invitation</p>
    <livewire:invite-create></livewire:invite-create>
    <p><i>(The data will be automatically updated every 10 seconds)</i></p>
    @if(session()->has('invited'))
        <div class="invited text-center py-2 mb-3">
            <i class="fa-solid fa-circle-check pe-2"></i>{{ session('invited') }}
        </div>
    @endif
    @if(session()->has('deleted'))
        <div class="deleted text-center py-2 mb-3">
            <i class="fa-solid fa-circle-check pe-2"></i>{{ session('deleted') }}
        </div>
    @endif
    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Quota</th>
            <th scope="col">Unique ID</th>
            <th scope="col">Presence</th>
            <th scope="col">Time Attend</th>
            <th scope="col">Link</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
            <tbody wire:poll.10s>
                @if($invites->count())        
                @foreach ($invites as $invite)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $invite->name }}</td>
                        <td>{{ $invite->quota }} Seat</td>
                        <td>{{ $invite->uniqid }}</td>
                        <td>
                            @if($invite->presence == 'true')
                                <span id="presence">Presence</span>
                            @endif
                            @if($invite->presence == 'false')
                                <span id="not-presence">Not Presence</span>
                            @endif
                        </td>
                        <td>
                            {{ $invite->time }}
                        </td>
                        <td>
                            <button class="btn btn-warning shadow-none" data-bs-toggle="modal" data-bs-target="#linkModal{{ $invite->id }}"><i class="fa-solid fa-link pe-2"></i>Link</button>
                            <div class="modal fade" id="linkModal{{ $invite->id }}" tabindex="-1" aria-labelledby="modalLink" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                      <h5 class="modal-title" id="modalLink">Link Invitation</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <p>Name : {{ $invite->name }}</p>
                                            <p>Quota : {{ $invite->quota }}</p>
                                            <p>Unique ID : {{ $invite->uniqid }}</p>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control shadow-none" id="share"
                                            value="https://noshiwedding.herokuapp.com/invitation/{{ $invite->uniqid }}" aria-describedby="copy-link">
                                            <button class="btn btn-outline-secondary shadow-none" data-clipboard-target="#share" type="button" id="copy-link">Copy</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-flex">
                            <button class="btn btn-danger shadow-none me-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $invite->id }}"><i class="fa-solid fa-trash-can"></i></button>
                            <div class="modal fade" id="deleteModal{{ $invite->id }}" tabindex="-1" aria-labelledby="modalDelete" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                      <h5 class="modal-title" id="modalDelete">Delete Invitation</h5>
                                    </div>
                                    <div class="modal-body">
                                        <strong>Are you sure to delete ?</strong>
                                        <div class="mt-3">
                                            <p>Name : {{ $invite->name }}</p>
                                            <p>Quota : {{ $invite->quota }}</p>
                                            <p>Unique ID : {{ $invite->uniqid }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                                      <a wire:click="deleteInvite({{ $invite->id }})" href="#" class="btn btn-danger shadow-none" data-bs-dismiss="modal">Delete</a>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <a href="/invitation/{{ $invite->uniqid }}" target="_blank" class="btn btn-primary shadow-none"><i class="fa-solid fa-paperclip"></i></a>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr>
                    <td class="text-center" colspan="8"><strong><i class="fa-brands fa-bilibili pe-2"></i>Empty</strong></td>
                </tr>
                @endif
         </tbody>
    </table>
</div>