<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SizeSelect extends Component
{
    public function render(): View|Closure|string
    {
        $sizes = ['small', 'medium', 'large'];

        return view('components.size-select', compact('sizes'));
    }
}
