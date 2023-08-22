<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pet;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('admin.home', [
            'totalUsers' => User::count(),
            'totalPets' => Pet::count(),
            'totalAdoptions' => Pet::adopted()->count()
        ]);
    }
}