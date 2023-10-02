<?php

namespace App\View\Components\Pets;

use App\Models\VeterinaryCare;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VeterinaryCaresCheckboxes extends Component
{
    public function render(): View|Closure|string
    {
        $veterinaryCares = VeterinaryCare::get(['id', 'name']);

        return view('components.pets.veterinary-cares-checkboxes', compact('veterinaryCares'));
    }
}
