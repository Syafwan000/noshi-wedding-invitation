<?php

namespace App\Http\Livewire;

use App\Models\Invite;
use Livewire\Component;
use Illuminate\Support\Str;

class InviteCreate extends Component
{
    public $name;
    public $quota;

    public function addInvite()
    {
        $this->validate([
            'name' => 'required',
            'quota' => 'required'
        ]);

        $uniqid = Str::random(14);

        $invited = Invite::create([
            'name' => $this->name,
            'quota' => $this->quota,
            'uniqid' => $uniqid
        ]);

        $this->name = "";
        $this->quota = "";
        $this->emit('inviteAdded', $invited);
    }

    public function render()
    {
        return view('livewire.invite-create');
    }
}
