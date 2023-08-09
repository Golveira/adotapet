<?php

namespace App\Services;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Arr;

class PetService
{
    public function store(array $petData, $image, int $userId)
    {
        $user = User::find($userId);

        $pet = $user
            ->pets()
            ->create(Arr::except($petData, [
                'veterinary_cares',
                'temperaments',
                'sociabilities'
            ]));

        $this->syncRelations($pet, $petData);

        $this->syncMedia($pet, $image);
    }

    public function update(Pet $pet, array $petData, $image)
    {
        $pet->update(Arr::except($petData, [
            'veterinary_cares',
            'temperaments',
            'sociabilities'
        ]));

        $this->syncRelations($pet, $petData);

        $this->syncMedia($pet, $image);
    }

    private function syncRelations(Pet $pet, array $petData)
    {
        $pet->veterinaryCares()
            ->sync($petData['veterinary_cares']);

        $pet->temperaments()
            ->sync($petData['temperaments']);

        $pet->sociabilities()
            ->sync($petData['sociabilities']);
    }

    private function syncMedia(Pet $pet, $image)
    {
        if ($image) {
            $pet->addMedia($image)->toMediaCollection('pets');
        }
    }
}