<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DashboardNavigation extends Component
{
    public function signout()
    {
        auth()->logout();

        $this->redirectRoute('admin.login');
    }

    public function render()
    {
        return view('livewire.components.dashboard-navigation');
    }
}
