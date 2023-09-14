<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $pets = Pet::query()
            ->visible()
            ->with(['media', 'city:id,title', 'state:id,letter'])
            ->limit(8)
            ->latest()
            ->get();

        return view('welcome', compact('pets'));
    }
}
