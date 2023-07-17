<?php

namespace App\Http\Controllers;

use App\Models\Pet;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $pets = Pet::latest()
            ->limit(8)
            ->get(['id', 'name', 'state', 'city', 'main_photo']);

        return view('welcome', compact('pets'));
    }
}