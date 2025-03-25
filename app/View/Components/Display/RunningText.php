<?php

namespace App\View\Components\Display;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RunningText extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.display.running-text');
    }
}
