<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Http\Controllers\Controller;

class PetAvailabilityController extends Controller
{
    public function markAsAvailable(Pet $pet)
    {
        $pet->update(['is_adopted' => false]);

        toast(__('pets.updated'), 'success');

        return redirect()->back();
    }

    public function markAsAdopted(Pet $pet)
    {
        $pet->update(['is_adopted' => true]);

        toast(__('pets.updated'), 'success');

        return redirect()->back();
    }
}