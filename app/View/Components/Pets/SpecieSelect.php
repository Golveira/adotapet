<?php

namespace App\View\Components\Pets;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SpecieSelect extends Component
{
    public function render(): View|Closure|string
    {
        $species = ['dog', 'cat'];

        return view('components.pets.specie-select', compact('species'));
    }
}
