<?php

namespace Tests\Feature;

use App\Models\Pet;
use Tests\TestCase;
use App\Models\User;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\VeterinaryCare;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_pet()
    {
        $user = User::factory()->create();

        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $temperaments = Temperament::factory()->count(3)->create();
        $veterinaryCares = VeterinaryCare::factory()->count(3)->create();
        $sociabilities = Sociability::factory()->count(3)->create();
        $photo = UploadedFile::fake()->image('pet.jpg');

        $formData = array_merge($petData, [
            'photo' => $photo,
            'temperaments' => $temperaments->pluck('id')->toArray(),
            'veterinary_cares' => $veterinaryCares->pluck('id')->toArray(),
            'sociabilities' => $sociabilities->pluck('id')->toArray(),
        ]);

        $response = $this->actingAs($user)
            ->post(route('pets.store'), $formData);

        $response->assertRedirect(route('pets.index'));

        $this->assertDatabaseHas('pets', $petData);

        $pet = Pet::first();

        foreach ($temperaments as $temperament) {
            $this->assertDatabaseHas('pet_temperament', [
                'pet_id' => $pet->id,
                'temperament_id' => $temperament->id,
            ]);
        }

        foreach ($veterinaryCares as $veterinaryCare) {
            $this->assertDatabaseHas('pet_veterinary_care', [
                'pet_id' => $pet->id,
                'veterinary_care_id' => $veterinaryCare->id,
            ]);
        }

        foreach ($sociabilities as $sociability) {
            $this->assertDatabaseHas('pet_sociability', [
                'pet_id' => $pet->id,
                'sociability_id' => $sociability->id,
            ]);
        }

        $this->assertDatabaseHas('media', [
            'model_id' => $pet->id,
        ]);
    }
}