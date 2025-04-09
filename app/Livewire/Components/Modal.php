<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class Modal extends Component
{
    public $id, $title, $type, $data, $invitation, $maximum, $timeAttend;

    #[Validate('required|max:60')]
    public $name;

    #[Validate('required')]
    public $quota;

    public function addInvitation()
    {
        $this->validate();

        $this->invitation->create([
            'name' => $this->name,
            'quota' => $this->quota,
            'identifier' => Str::random(10),
        ]);

        $this->reset('name', 'quota');
        $this->dispatch('trigger-refresh');
        $this->dispatch('close-modal');
    }

    public function editInvitation($id)
    {
        $this->validate();

        $this->invitation->find($id)->update([
            'name' => $this->name,
            'quota' => $this->quota,
        ]);

        $this->dispatch('trigger-refresh');
        $this->dispatch('close-modal');
    }

    public function deleteInvitation($id)
    {
        $this->invitation->find($id)->delete();
        $this->dispatch('trigger-refresh');
        $this->dispatch('close-modal');
    }

    #[On('attendance')]
    public function attendance($identifier)
    {
        $this->data = $this->invitation->where('identifier', $identifier)->first();

        if ($this->data->attendance < $this->data->quota) {
            $this->invitation->where('identifier', $identifier)->update([
                'attendance' => $this->data->attendance + 1,
            ]);
            $this->timeAttend = Carbon::now()->toDateTimeString();
            $this->dispatch('open-modal');
            return;
        }
        $this->maximum = true;
        $this->dispatch('open-modal');
        return;
    }

    public function mount(Invitation $invitation, $id, $title, $type, $data = '')
    {
        $this->invitation = $invitation;
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->data = $data;

        $this->name = $this->data['name'] ?? '';
        $this->quota = $this->data['quota'] ?? '';
    }

    public function render()
    {
        return view('livewire.components.modal');
    }
}
