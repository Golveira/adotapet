<?php

namespace Tests\Feature;

use App\Models\Pet;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_pet()
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $petData = Pet::factory()
            ->make(['user_id' => $user->id])
            ->toArray();

        $image = UploadedFile::fake()->image('pet.jpg');

        $response = $this
            ->actingAs($user)
            ->post(route('pets.store'), array_merge($petData, [
                'photo' => $image,
                'veterinary_cares' => [1],
                'temperaments' => [1],
                'sociabilities' => [1],
            ]));

        $response->assertRedirect(route('profile.show', $user->username));

        $pet = $user->pets()->first();

        $this->assertNotNull($pet);

        $this->assertDatabaseHas('pets', $petData);

        $this->assertDatabaseHas('pet_veterinary_care', [
            'pet_id' => $pet->id,
            'veterinary_care_id' => 1,
        ]);

        $this->assertDatabaseHas('pet_temperament', [
            'pet_id' => $pet->id,
            'temperament_id' => 1,
        ]);

        $this->assertDatabaseHas('pet_sociability', [
            'pet_id' => $pet->id,
            'sociability_id' => 1,
        ]);

        Storage::disk('public')->assertExists('1/pet.jpg');
    }


    public function test_user_can_update_pet()
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $pet = Pet::factory()
            ->withTemperaments()
            ->withVeterinaryCares()
            ->withSociabilities()
            ->create(['user_id' => $user->id]);

        $petData = Pet::factory()
            ->make(['user_id' => $user->id])
            ->toArray();

        $image = UploadedFile::fake()->image('pet.jpg');

        $formData = array_merge($petData, [
            'photo' => $image,
            'temperaments' => [1],
            'sociabilities' => [1],
            'veterinary_cares' => [],
        ]);

        $response = $this
            ->actingAs($user)
            ->put(route('pets.update', $pet), $formData);

        $response->assertRedirect(route('profile.show', $user->username));

        $pet->refresh();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertEquals(1, $pet->temperaments->count());
        $this->assertEquals(1, $pet->sociabilities->count());
        $this->assertEmpty($pet->veterinaryCares);
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_user_can_delete_pet()
    {
        $user = User::factory()->create();

        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->delete(route('pets.destroy', $pet->id));

        $response->assertRedirect(route('profile.show', $user->username));

        $this->assertDatabaseEmpty('pets');
    }
}