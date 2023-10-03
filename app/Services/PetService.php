<?php

namespace App\Services;

use App\Models\Pet;
use Illuminate\Http\UploadedFile;

class PetService
{
    public function store(array $data): void
    {
        $pet = Pet::create($data);

        $this->syncRelations($pet, $data);

        $this->uploadPhoto($pet, $data['photo']);
    }

    public function update(Pet $pet, array $data): void
    {
        $pet->update($data);

        $this->syncRelations($pet, $data);

        if ($data['photo'] ?? false) {
            $this->uploadPhoto($pet, $data['photo']);
        }
    }

    private function syncRelations(Pet $pet, array $data): void
    {
        $pet->veterinaryCares()
            ->sync($data['veterinary_cares']);

        $pet->temperaments()
            ->sync($data['temperaments']);

        $pet->sociabilities()
            ->sync($data['sociabilities']);
    }

    private function uploadPhoto(Pet $pet, UploadedFile $photo): void
    {
        $pet->addMedia($photo)->toMediaCollection('pets');
    }
}
