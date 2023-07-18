<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $pets = Pet::latest()
            ->with('media')
            ->limit(8)
            ->get(['id', 'name', 'state', 'city']);

        return view('welcome', compact('pets'));
    }
}
