<?php

namespace App\Livewire\Pages;

use App\Models\Guestbook as ModelsGuestbook;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Guestbook extends Component
{
    use WithPagination;

    #[Url]
    public $search = '';

    public ModelsGuestbook $guestbook;

    public function refresh() {}

    public function mount(ModelsGuestbook $guestbook)
    {
        $this->guestbook = $guestbook;
    }

    public function render()
    {
        return view('livewire.pages.guestbook', [
            'guestbooks' => $this->guestbook->search($this->search)->latest()->paginate(10),
            'total' => $this->guestbook->all()->count()
        ])->title('Guestbook - NoShi');
    }
}
