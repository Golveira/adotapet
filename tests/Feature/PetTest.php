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
        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1, 2, 3];
        $temperaments = [1, 2, 3];
        $sociabilities = [1, 2, 3];

        $response = $this->actingAs($user)
            ->post(route('pets.store'), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $pet = Pet::first();

        $response->assertRedirect(route('profile.show', $user->username));

        $this->assertDatabaseHas('pets', $petData);

        $this->assertHasRelationships($pet, $veterinaryCares, $temperaments, $sociabilities);

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_admin_can_create_pet()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1, 2, 3];
        $temperaments = [1, 2, 3];
        $sociabilities = [1, 2, 3];

        $response = $this->actingAs($user)
            ->post(route('admin.pets.store'), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $pet = Pet::first();

        $response->assertRedirect(route('admin.pets.index'));

        $this->assertDatabaseHas('pets', $petData);

        $this->assertHasRelationships($pet, $veterinaryCares, $temperaments, $sociabilities);

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_admin_can_update_pet()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);
        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $response = $this->actingAs($user)
            ->put(route('admin.pets.update', $pet), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $pet = $pet->fresh();

        $response->assertRedirect(route('admin.pets.index'));

        $this->assertDatabaseHas('pets', $petData);

        $this->assertHasRelationships($pet, $veterinaryCares, $temperaments, $sociabilities);

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_admin_can_delete_pet()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->delete(route('admin.pets.destroy', $pet));

        $response->assertRedirect(route('admin.pets.index'));

        $this->assertDatabaseMissing('pets', ['id' => $pet->id]);
    }

    private function assertHasRelationships(Pet $pet, array $veterinaryCares, array $temperaments, array $sociabilities): void
    {
        foreach ($veterinaryCares as $veterinaryCare) {
            $this->assertTrue($pet->veterinaryCares->contains($veterinaryCare));
        }

        foreach ($temperaments as $temperament) {
            $this->assertTrue($pet->temperaments->contains($temperament));
        }

        foreach ($sociabilities as $sociability) {
            $this->assertTrue($pet->sociabilities->contains($sociability));
        }
    }
}
