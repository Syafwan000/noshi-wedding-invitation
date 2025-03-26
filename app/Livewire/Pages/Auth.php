<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Auth extends Component
{
    #[Validate('required')]
    public $username = '';

    #[Validate('required')]
    public $password = '';

    public function authenticate()
    {
        $this->validate();

        if(FacadesAuth::attempt(['username' => $this->username, 'password' => $this->password])) {
            $this->redirectRoute('admin.guestbook');
            $this->reset();
        };

        session()->flash('error', 'Invalid username or password');
        $this->reset('password');
    }

    public function render()
    {
        return view('livewire.pages.auth')
            ->title('Admin Panel - NoShi');
    }
}
