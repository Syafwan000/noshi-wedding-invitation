<?php

namespace App\Livewire\Pages;

use App\Models\Invitation as ModelsInvitation;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Invitation extends Component
{
    use WithPagination;

    #[Url]
    public ?string $search = '';

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
            'invitations' => $this->invitation->search($this->search)->latest()->paginate(10),
            'total' => $this->invitation->all()->count()
        ])->title('Invitation - NoShi');
    }
}
