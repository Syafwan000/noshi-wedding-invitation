<div class="invitation-text
    @if($data->attendance == $data->quota)
        text-danger
    @else
        text-success
    @endif
    ">
    <strong wire:poll>Quota {{ $data->attendance }}/{{ $data->quota }}</strong>
</div>
