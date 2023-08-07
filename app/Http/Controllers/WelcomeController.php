<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        $pets = Pet::latest()
            ->with(['media', 'city', 'state'])
            ->limit(8)
            ->get();

        return view('welcome', compact('pets', 'user'));
    }
}