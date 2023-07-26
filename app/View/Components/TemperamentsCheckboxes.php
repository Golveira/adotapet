<?php

namespace App\View\Components;

use Closure;
use App\Models\Temperament;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TemperamentsCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $temperaments = Temperament::get(['id', 'name']);

        return view('components.temperaments-checkboxes', compact('temperaments'));
    }
}