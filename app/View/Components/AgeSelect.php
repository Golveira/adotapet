<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AgeSelect extends Component
{
    public function render(): View|Closure|string
    {
        $ages = ['puppy', 'adult', 'senior'];

        return view('components.age-select', compact('ages'));
    }
}
