<?php

namespace App\View\Components;

use Closure;
use App\Models\Sociability;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SociabilitiesCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $sociabilities = Sociability::get(['id', 'name']);

        return view('components.sociabilities-checkboxes', compact('sociabilities'));
    }
}