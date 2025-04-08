<?php

namespace App\Livewire\Pages;

use App\Models\Invitation as ModelsInvitation;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Invitation extends Component
{
    use WithPagination;

    public ModelsInvitation $invitation;

    public function mount(ModelsInvitation $invitation)
    {
        $this->invitation = $invitation;
    }

    #[On('trigger-refresh')]
    public function refresh() {}

    public function render()
    {
        return view('livewire.pages.invitation', [
            'invitations' => $this->invitation->latest()->paginate(10),
            'total' => $this->invitation->all()->count()
        ])->title('Invitation - NoShi');
    }
}
