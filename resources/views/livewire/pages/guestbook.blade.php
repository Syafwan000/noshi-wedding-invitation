<div class="admin-page container py-5">
    <div class="header-wrapper">
        <div class="title-wrapper">
            <h3>Guestbook</h3>
            <p>{{ $total }} Messages (Overall)</p>
        </div>
        <div class="action-wrapper">
            <button wire:click="refresh" class="btn btn-warning">Refresh</button>
            <input wire:model.live="search" type="text" class="form-control w-100" placeholder="Search Keyword...">
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Name</th>
                    <th scope="col">Message</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @if($guestbooks->count())
                    @foreach ($guestbooks as $guestbook)
                        <tr wire:key="guestbook-{{ $guestbook->id }}">
                            <td scope="row">{{ $guestbooks->firstItem() + $loop->index }}</td>
                            <td>{{ $guestbook->created_at }}</td>
                            <td>{{ $guestbook->name }}</td>
                            <td>{{ Str::limit($guestbook->message, 10) }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#guestbookDetail{{ $guestbook->id }}">Detail</button>
                                <livewire:components.modal
                                    type="guestbook"
                                    title="Guestbook Detail"
                                    :id="'guestbookDetail' . $guestbook->id"
                                    :key="'guestbookDetail' . $guestbook->id"
                                    :data="$guestbook" />
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="4"><strong><i class="fa-brands fa-bilibili pe-2"></i>Empty</strong></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{ $guestbooks->links() }}
  </div>
