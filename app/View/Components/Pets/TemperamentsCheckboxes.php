<?php

namespace App\View\Components\Pets;

use Closure;
use App\Models\Temperament;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TemperamentsCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $temperaments = Temperament::get(['id', 'name']);

        return view('components.pets.temperaments-checkboxes', compact('temperaments'));
    }
}
