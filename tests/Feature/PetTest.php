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
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $response = $this->actingAs($user)
            ->post(route('pets.store'), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $response->assertRedirect(route('profile.show', $user->username));

        $pet = Pet::first();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertTrue($pet->veterinaryCares->contains(1));
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_user_can_update_pet()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);
        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $response = $this
            ->actingAs($user)
            ->put(route('pets.update', $pet->id), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $response->assertRedirect(route('profile.show', $user->username));

        $pet = Pet::first();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertTrue($pet->veterinaryCares->contains(1));
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

        $this->assertDatabaseMissing('pets', ['id' => $pet->id]);
    }

    public function test_user_can_mark_pet_as_adopted()
    {
        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->post(route('pets.mark-as-adopted', $pet->id));

        $response->assertRedirect();

        $this->assertDatabaseHas('pets', ['id' => $pet->id, 'is_adopted' => true]);
    }

    public function test_user_can_mark_pet_as_available()
    {
        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id, 'is_adopted' => true]);

        $response = $this
            ->actingAs($user)
            ->post(route('pets.mark-as-available', $pet->id));

        $response->assertRedirect();

        $this->assertDatabaseHas('pets', ['id' => $pet->id, 'is_adopted' => false]);
    }
}
