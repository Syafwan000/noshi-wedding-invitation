<div class="container show-wish py-5">
  <h3><i class="fa-brands fa-gratipay pe-2"></i>Wishes</h3>
  <p>{{ $total_wish }} Messages</p>
  <p><i>(The data will be automatically updated every 10 seconds)</i></p>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">From</th>
        <th scope="col">Message</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody wire:poll.10s>
      @if($wishes->count())
      @foreach ($wishes as $wish)           
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $wish->name }}</td>
          <td>{{ $wish->message }}</td>
          <td>{{ $wish->created_at->diffForHumans() }}</td>
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