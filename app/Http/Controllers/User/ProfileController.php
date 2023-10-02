<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(string $username): View
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.profile.show', compact('user'));
    }
}
