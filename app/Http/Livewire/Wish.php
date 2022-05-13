<?php

namespace App\Http\Livewire;

use App\Models\Wish as ModelWish;
use Livewire\Component;

class Wish extends Component
{
    public $name;
    public $message;

    public function sendWish()
    {
        $this->validate([
            'name' => 'required',
            'message' => 'required'
        ]);

        ModelWish::create([
            'name' => $this->name,
            'message' => $this->message
        ]);

        $this->name = '';
        $this->message = '';

        session()->flash('thanks', 'Message sent successfully');
    }

    public function render()
    {
        return view('livewire.wish');
    }
}
