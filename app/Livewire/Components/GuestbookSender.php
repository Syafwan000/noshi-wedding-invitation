<?php

namespace App\Livewire\Components;

use App\Models\Guestbook as ModelsGuestbook;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GuestbookSender extends Component
{
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required')]
    public $message = '';

    public function submit()
    {
        $this->validate();

        try {
            ModelsGuestbook::create([
                'name' => $this->name,
                'message' => $this->message,
            ]);

            session()->flash('success', 'Message sent successfully');
            $this->reset();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to submit message, please try again');
            return;
        }
    }

    public function render()
    {
        return view('livewire.components.guestbook-sender');
    }
}
