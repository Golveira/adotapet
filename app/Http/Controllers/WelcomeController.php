<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $pets = Pet::latest()
            ->with(['media', 'city', 'state'])
            ->limit(8)
            ->get();

        return view('welcome', compact('pets'));
    }
}
