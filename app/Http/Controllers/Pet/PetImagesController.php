<?php

namespace App\Http\Controllers\Pet;

use App\Models\Pet;

class PetImagesController
{
    public function __invoke(Pet $pet)
    {
        return view('pets.images.index', compact('pet'));
    }
}
