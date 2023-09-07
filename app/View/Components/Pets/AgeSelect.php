<?php

namespace App\View\Components\Pets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AgeSelect extends Component
{
    public function render(): View|Closure|string
    {
        $ages = ['puppy', 'adult', 'senior'];

        return view('components.pets.age-select', compact('ages'));
    }
}
