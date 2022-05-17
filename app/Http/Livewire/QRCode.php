<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QRCode extends Component
{
    public $output;

    public function render()
    {
        return view('livewire.q-r-code');
    }
}
