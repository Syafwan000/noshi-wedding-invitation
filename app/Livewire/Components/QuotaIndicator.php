<?php

namespace App\Livewire\Components;

use App\Models\Invitation;
use Livewire\Attributes\On;
use Livewire\Component;

class QuotaIndicator extends Component
{
    public $identifier, $invitation;

    public function mount(Invitation $invitation, $identifier)
    {
        $this->invitation = $invitation;
        $this->identifier = $identifier;
    }

    public function render()
    {
        return view('livewire.components.quota-indicator', [
            'data' => $this->invitation->where('identifier', $this->identifier)->first(['attendance', 'quota']),
        ]);
    }
}
