<?php

namespace App\Livewire\Pages;

use App\Models\Invitation;
use Livewire\Attributes\On;
use Livewire\Component;

class Scan extends Component
{
    public function render()
    {
        return view('livewire.pages.scan')
            ->title('QR Scan - NoShi');
    }
}
