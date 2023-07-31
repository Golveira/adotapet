<?php

namespace Tests\Feature;

use App\Models\Pet;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_pet()
    {
        $user = User::factory()->create();

        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('photo.jpg');

        $formData = array_merge($petData, [
            'photo' => $photo,
            'temperaments' => [1, 2],
            'veterinary_cares' => [1],
            'sociabilities' => [1],
        ]);

        $response = $this
            ->actingAs($user)
            ->post(route('pets.store'), $formData);

        $response
            ->assertRedirect(route('profile.show', $user->username));

        $pet = Pet::first();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertEquals(2, $pet->temperaments->count());
        $this->assertEquals(1, $pet->veterinaryCares->count());
        $this->assertEquals(1, $pet->sociabilities->count());
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->temperaments->contains(2));
        $this->assertTrue($pet->veterinaryCares->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));
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

    public function test_user_can_delete_pet()
    {
        $user = User::factory()->create();

        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->delete(route('pets.destroy', $pet->id));

        $response
            ->assertRedirect(route('profile.show', $user->username));

        $this->assertDatabaseMissing('pets', ['id' => $pet->id]);
    }
}