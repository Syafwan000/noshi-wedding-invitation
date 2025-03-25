<?php

namespace App\Livewire;

use App\Models\Guestbook as ModelsGuestbook;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Guestbook extends Component
{
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required')]
    public $message = '';

    public function submit()
    {
        $this->validate();

        ModelsGuestbook::create([
            'name' => $this->name,
            'message' => $this->message,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.guestbook');
    }
}
