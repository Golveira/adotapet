<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $pets = Pet::latest()
            ->with(['media', 'city:id,title', 'state:id,letter'])
            ->limit(8)
            ->get();

        return view('welcome', compact('pets'));
    }
}