<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __invoke()
    {
        return view('user.settings.index', [
            'user' => Auth::user(),
        ]);
    }
}
