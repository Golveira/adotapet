<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $bookmarks = Auth::user()
            ->bookmarks()
            ->pluck('pets.id');

        $pets = Pet::latest()
            ->with(['media', 'city', 'state'])
            ->limit(8)
            ->get()
            ->map(function ($pet) use ($bookmarks) {
                $pet->is_bookmarked = $bookmarks->contains($pet->id);
                return $pet;
            });

        return view('welcome', compact('pets'));
    }
}