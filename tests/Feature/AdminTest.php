<?php

namespace Tests\Feature;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_dashboard()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this
            ->actingAs($admin)
            ->get(route('admin.home'));

        $response->assertOk();
    }

    public function test_user_cannot_view_dashboard()
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get(route('admin.home'));

        $response->assertForbidden();
    }

    public function test_admin_can_create_pet()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create();
        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $response = $this
            ->actingAs($admin)
            ->post(route('admin.pets.store'), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $response->assertRedirect(route('admin.pets.index'));

        $pet = Pet::first();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertTrue($pet->veterinaryCares->contains(1));
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_admin_can_update_pet()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);
        $petData = Pet::factory()->make(['user_id' => $user->id])->toArray();
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $response = $this
            ->actingAs($admin)
            ->put(route('admin.pets.update', $pet), [
                ...$petData,
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]);

        $response->assertRedirect(route('admin.pets.index'));

        $pet = Pet::first();

        $this->assertDatabaseHas('pets', $petData);
        $this->assertTrue($pet->veterinaryCares->contains(1));
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_admin_can_delete_pet()
    {
        Storage::fake('public');

        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($admin)
            ->delete(route('admin.pets.destroy', $pet));

        $response->assertRedirect(route('admin.pets.index'));

        $this->assertDatabaseMissing('pets', ['id' => $pet->id]);
    }
}
