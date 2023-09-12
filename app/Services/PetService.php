<?php

namespace App\Services;

use App\Models\Pet;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class PetService
{
    public function store(array $petData): void
    {
        $pet = Pet::create([
            'user_id' => $petData['user_id'] ?? Auth::user()->id,
            'name' => $petData['name'],
            'specie' =>  $petData['specie'],
            'sex'  =>  $petData['sex'],
            'age' =>  $petData['age'],
            'size' =>  $petData['size'],
            'state_id' =>  $petData['state_id'],
            'city_id' =>  $petData['city_id'],
            'description' =>  $petData['description'],
        ]);

        $this->syncData($pet, $petData);

        $this->uploadImage($pet, $petData['photo']);
    }

    public function update(Pet $pet, array $petData): void
    {
        $pet->update([
            'name' => $petData['name'],
            'specie' =>  $petData['specie'],
            'sex'  =>  $petData['sex'],
            'age' =>  $petData['age'],
            'size' =>  $petData['size'],
            'state_id' =>  $petData['state_id'],
            'city_id' =>  $petData['city_id'],
            'description' =>  $petData['description'],
        ]);

        $this->syncData($pet, $petData);

        if ($petData['photo'] ?? false) {
            $this->uploadImage($pet, $petData['photo']);
        }
    }

    private function syncData(Pet $pet, array $petData): void
    {
        $pet->veterinaryCares()
            ->sync($petData['veterinary_cares']);

        $pet->temperaments()
            ->sync($petData['temperaments']);

        $pet->sociabilities()
            ->sync($petData['sociabilities']);
    }

    private function uploadImage(Pet $pet, UploadedFile $image): void
    {
        $pet->addMedia($image)->toMediaCollection('pets');
    }
}
