<?php

namespace Tests\Feature;

use App\Models\Pet;
use Tests\TestCase;
use App\Models\User;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\VeterinaryCare;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_pet()
    {
        $user = User::factory()->create();

        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $temperaments = Temperament::pluck('id')->toArray();
        $veterinaryCares = VeterinaryCare::pluck('id')->toArray();
        $sociabilities = Sociability::pluck('id')->toArray();
        $photo = UploadedFile::fake()->image('photo.jpg');

        $formData = array_merge($petData, [
            'photo' => $photo,
            'temperaments' => $temperaments,
            'veterinary_cares' => $veterinaryCares,
            'sociabilities' => $sociabilities,
        ]);

        $response = $this
            ->actingAs($user)
            ->post(route('pets.store'), $formData);

        $response
            ->assertRedirect(route('profile.show', $user->username));

        $this->assertDatabaseHas('pets', $petData);

        $pet = Pet::first();

        foreach ($temperaments as $temperament) {
            $this->assertDatabaseHas('pet_temperament', [
                'pet_id' => $pet->id,
                'temperament_id' => $temperament,
            ]);
        }

        foreach ($veterinaryCares as $veterinaryCare) {
            $this->assertDatabaseHas('pet_veterinary_care', [
                'pet_id' => $pet->id,
                'veterinary_care_id' => $veterinaryCare,
            ]);
        }

        foreach ($sociabilities as $sociability) {
            $this->assertDatabaseHas('pet_sociability', [
                'pet_id' => $pet->id,
                'sociability_id' => $sociability,
            ]);
        }

        $this->assertDatabaseHas('media', [
            'model_id' => $pet->id,
            'file_name' => $photo->name,
        ]);
    }

    public function test_user_can_update_pet()
    {
        $user = User::factory()->create();

        $pet = Pet::factory()
            ->withTemperaments()
            ->withVeterinaryCares()
            ->withSociabilities()
            ->create(['user_id' => $user->id]);

        $petData = Pet::factory()
            ->make(['user_id' => $user->id])
            ->toArray();

        $photo = UploadedFile::fake()->image('new-photo.jpg');

        $formData = array_merge($petData, [
            'photo' => $photo,
            'temperaments' => [1],
            'sociabilities' => [1],
            'veterinary_cares' => [],
        ]);

        $response = $this
            ->actingAs($user)
            ->put(route('pets.update', $pet), $formData);

        $response
            ->assertRedirect(route('profile.show', $user->username));

        $pet->refresh();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertEquals(1, $pet->temperaments->count());
        $this->assertEquals(1, $pet->sociabilities->count());
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));
        $this->assertEmpty($pet->veterinaryCares);
        $this->assertDatabaseHas('media', [
            'model_id' => $pet->id,
            'file_name' => $photo->name,
        ]);
    }
}