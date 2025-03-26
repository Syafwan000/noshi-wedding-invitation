<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Guestbook extends Component
{
    public function render()
    {
        return view('livewire.pages.guestbook')
            ->title('Guestbook - NoShi');
    }
}
