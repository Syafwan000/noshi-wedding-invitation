<?php

namespace App\Http\Livewire;

use App\Models\Wish;
use Livewire\Component;

class ShowWish extends Component
{
    public function render()
    {
        return view('livewire.show-wish', [
            'wishes' => Wish::latest()->get(),
            'total_wish' => count(Wish::all())
        ]);
    }
}
