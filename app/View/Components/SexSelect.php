<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SexSelect extends Component
{
    public function render(): View|Closure|string
    {
        $sexOptions = ['male', 'female'];

        return view('components.sex-select', compact('sexOptions'));
    }
}
