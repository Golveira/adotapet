<?php

namespace App\View\Components\Pets;

use App\Models\Sociability;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SociabilitiesCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $sociabilities = Sociability::get(['id', 'name']);

        return view('components.pets.sociabilities-checkboxes', compact('sociabilities'));
    }
}
