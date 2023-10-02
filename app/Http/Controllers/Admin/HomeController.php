<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('admin.home', [
            'totalUsers' => User::count(),
            'totalPets' => Pet::count(),
            'totalAdoptions' => Pet::adopted()->count(),
        ]);
    }
}
