<?php

namespace App\Livewire\Pages;

use App\Models\Guestbook as ModelsGuestbook;
use Livewire\Component;
use Livewire\WithPagination;

class Guestbook extends Component
{
    use WithPagination;

    public ModelsGuestbook $guestbook;

    public function refresh() {}

    public function mount(ModelsGuestbook $guestbook)
    {
        $this->guestbook = $guestbook;
    }

    public function render()
    {
        return view('livewire.pages.guestbook', [
            'guestbooks' => $this->guestbook->latest()->paginate(10),
            'total' => $this->guestbook->all()->count()
        ])->title('Guestbook - NoShi');
    }
}
