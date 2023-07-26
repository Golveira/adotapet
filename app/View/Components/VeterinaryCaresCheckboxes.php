<?php

namespace App\View\Components;

use Closure;
use App\Models\VeterinaryCare;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class VeterinaryCaresCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $veterinaryCares = VeterinaryCare::get(['id', 'name']);

        return view('components.veterinary-cares-checkboxes', compact('veterinaryCares'));
    }
}