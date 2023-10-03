<?php

namespace Tests\Feature;

use App\Http\Livewire\ShowPets;
use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_can_view_pets()
    {
        $this->createPet(['name' => 'Luna']);
        $this->createPet(['name' => 'Juno']);

        $this->get('/pets')
            ->assertOk()
            ->assertSeeLivewire('show-pets')
            ->assertSee('Luna')
            ->assertSee('Juno');
    }

    public function test_guests_can_view_a_pet()
    {
        $pet = $this->createPet();

        $this->get("/pets/{$pet->id}")
            ->assertOk()
            ->assertSee($pet->name)
            ->assertSee($pet->user->name)
            ->assertSee(__($pet->specie))
            ->assertSee(__($pet->sex))
            ->assertSee(__($pet->age))
            ->assertSee(__($pet->size))
            ->assertSee($pet->address)
            ->assertSee($pet->description);
    }

    public function test_pets_are_shown_when_filters_are_applied()
    {
        Pet::factory()->count(3)->create();

        $pet = $this->createPet([
            'name' => 'Luna',
            'specie' => 'dog',
            'size' => 'small',
            'sex' => 'female',
            'age' => 'adult',
            'state_id' => 1,
            'city_id' => 53,
        ]);

        Livewire::test(ShowPets::class)
            ->set('filters.name', $pet->name)
            ->set('filters.specie', $pet->specie)
            ->set('filters.size', $pet->size)
            ->set('filters.sex', $pet->sex)
            ->set('filters.age', $pet->age)
            ->set('filters.stateId', $pet->state_id)
            ->set('filters.cityId', $pet->city_id)
            ->assertSee($pet->name)
            ->assertViewHas('pets', fn ($pets) => $pets->count() === 1);
    }

    public function test_no_pets_are_shown_when_filters_are_applied()
    {
        Pet::factory()->count(3)->create();

        Livewire::test(ShowPets::class)
            ->set('filters.name', 'Testing name')
            ->set('filters.specie', 'cat')
            ->set('filters.size', 'large')
            ->set('filters.sex', 'male')
            ->set('filters.age', 'puppy')
            ->set('filters.stateId', 1)
            ->set('filters.cityId', 53)
            ->assertSee(__('No pets found'));
    }

    public function test_actions_buttons_are_shown_when_user_is_the_owner()
    {
        $user = $this->createUser();

        $pet = $this->createPet([
            'user_id' => $user->id,
            'is_adopted' => 0,
        ]);

        $this->actingAs($user)
            ->get("/pets/{$pet->id}")
            ->assertSee(__('Edit'))
            ->assertSee(__('Images'))
            ->assertSee(__('Delete'))
            ->assertSee(__('Mark as adopted'));
    }

    public function test_actions_buttons_are_not_shown_to_guests()
    {
        $pet = $this->createPet(['is_adopted' => 0]);

        $this->get("/pets/{$pet->id}")
            ->assertDontSee(__('Edit'))
            ->assertDontSee(__('Images'))
            ->assertDontSee(__('Delete'))
            ->assertDontSee(__('Mark as adopted'));
    }

    public function test_actions_buttons_are_not_shown_when_user_is_not_the_owner()
    {
        $user = $this->createUser();

        $pet = $this->createPet(['is_adopted' => 0]);

        $this->actingAs($user)
            ->get("/pets/{$pet->id}")
            ->assertDontSee(__('Edit'))
            ->assertDontSee(__('Images'))
            ->assertDontSee(__('Delete'))
            ->assertDontSee(__('Mark as adopted'));
    }

    public function test_user_can_create_a_pet()
    {
        Storage::fake('public');

        $user = $this->createUser();
        $params = $this->validParams(['user_id' => $user->id]);
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $this->actingAs($user)
            ->post('/pets', array_merge($params, [
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]))
            ->assertRedirect("/@{$user->username}");

        $pet = Pet::first();

        $this->assertDatabaseHas('pets', $params);
        $this->assertTrue($pet->veterinaryCares->contains(1));
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_user_cannot_create_pet_if_email_is_not_verified()
    {
        $user = $this->createUser(['email_verified_at' => null]);

        $this->actingAs($user)
            ->post('/pets', $this->validParams())
            ->assertRedirect('/verify-email');
    }

    public function test_user_can_update_a_pet()
    {
        Storage::fake('public');

        $user = $this->createUser();
        $pet = $this->createPet(['user_id' => $user->id]);
        $params = $this->validParams(['user_id' => $user->id]);
        $photo = UploadedFile::fake()->image('pet.jpg');
        $veterinaryCares = [1];
        $temperaments = [1];
        $sociabilities = [1];

        $this->actingAs($user)
            ->put("/pets/{$pet->id}", array_merge($params, [
                'photo' => $photo,
                'veterinary_cares' => $veterinaryCares,
                'temperaments' => $temperaments,
                'sociabilities' => $sociabilities,
            ]))
            ->assertRedirect("/@{$user->username}");

        $pet->refresh();

        $this->assertDatabaseHas('pets', $params);
        $this->assertTrue($pet->veterinaryCares->contains(1));
        $this->assertTrue($pet->temperaments->contains(1));
        $this->assertTrue($pet->sociabilities->contains(1));

        Storage::disk('public')->assertExists('1/pet.jpg');
    }

    public function test_user_cannot_update_a_pet_from_another_user()
    {
        $user = $this->createUser();
        $pet = $this->createPet();

        $this->actingAs($user)
            ->put("/pets/{$pet->id}", $this->validParams())
            ->assertForbidden();
    }

    public function test_user_can_delete_a_pet()
    {
        $user = $this->createUser();
        $pet = $this->createPet(['user_id' => $user->id]);

        $this->actingAs($user)
            ->delete("/pets/{$pet->id}")
            ->assertRedirect("/@{$user->username}");

        $this->assertDatabaseMissing('pets', $pet->toArray());
    }

    public function test_user_cannot_delete_a_pet_from_another_user()
    {
        $user = $this->createUser();
        $pet = $this->createPet();

        $this->actingAs($user)
            ->delete("/pets/{$pet->id}")
            ->assertForbidden();
    }

    public function test_user_can_mark_a_pet_as_adopted()
    {
        $user = $this->createUser();
        $pet = $this->createPet([
            'user_id' => $user->id,
            'is_adopted' => false,
        ]);

        $this->actingAs($user)
            ->post("/pets/$pet->id/mark-as-adopted")
            ->assertRedirect();

        $this->assertDatabaseHas('pets', [
            'id' => $pet->id,
            'is_adopted' => true,
        ]);
    }

    public function test_user_cannot_mark_a_pet_from_another_user_as_adopted()
    {
        $user = $this->createUser();
        $pet = $this->createPet([
            'is_adopted' => false,
        ]);

        $this->actingAs($user)
            ->post("/pets/$pet->id/mark-as-adopted")
            ->assertForbidden();
    }

    public function test_user_can_mark_a_pet_as_available()
    {
        $user = $this->createUser();
        $pet = $this->createPet([
            'user_id' => $user->id,
            'is_adopted' => true,
        ]);

        $this->actingAs($user)
            ->post("/pets/$pet->id/mark-as-available")
            ->assertRedirect();

        $this->assertDatabaseHas('pets', [
            'id' => $pet->id,
            'is_adopted' => false,
        ]);
    }

    public function test_user_cannot_mark_a_pet_from_another_user_as_available()
    {
        $user = $this->createUser();
        $pet = $this->createPet([
            'is_adopted' => true,
        ]);

        $this->actingAs($user)
            ->post("/pets/$pet->id/mark-as-available")
            ->assertForbidden();
    }

    private function validParams($overrides = []): array
    {
        $data = Pet::factory()->make()->toArray();

        return array_merge($data, $overrides);
    }
}
