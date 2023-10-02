<?php

namespace App\View\Components\Pets;

use App\Models\Temperament;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TemperamentsCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $temperaments = Temperament::get(['id', 'name']);

        return view('components.pets.temperaments-checkboxes', compact('temperaments'));
    }
}
