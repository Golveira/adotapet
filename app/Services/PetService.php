<?php

namespace App\Services;

use App\Models\Pet;
use App\Models\User;

class PetService
{
    public function store(array $petData, $image, int $userId)
    {
        $user = User::find($userId);

        $pet = $user->pets()->create([
            'name' => $petData['name'],
            'specie' => $petData['specie'],
            'sex' => $petData['sex'],
            'age' => $petData['age'],
            'size' => $petData['size'],
            'description' => $petData['description'],
            'state_id' => $petData['state_id'],
            'city_id' => $petData['city_id'],
        ]);

        $pet->veterinaryCares()
            ->sync($petData['veterinary_cares']);

        $pet->temperaments()
            ->sync($petData['temperaments']);

        $pet->sociabilities()
            ->sync($petData['sociabilities']);

        if ($image) {
            $pet->addMedia($image)->toMediaCollection('pets');
        }
    }
}