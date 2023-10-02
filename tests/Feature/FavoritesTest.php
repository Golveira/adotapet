<?php

namespace Tests\Feature;

use App\Http\Livewire\FavoriteButton;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
    use RefreshDatabase;

    public function test_favorites_page_is_displayed()
    {
        $user = $this->createUser();
        $pet = $this->createPet();

        $user->favorite($pet);

        $this->actingAs($user)
            ->get('/favorites')
            ->assertOk()
            ->assertSee($pet->name);
    }

    public function test_favorites_page_is_not_displayed_for_guests()
    {
        $this->get('/favorites')
            ->assertRedirect('/login');
    }

    public function test_guests_cannot_favorite_a_pet()
    {
        $pet = $this->createPet();

        Livewire::test(FavoriteButton::class, ['pet' => $pet])
            ->assertSet('pet', $pet)
            ->call('toggleFavorite')
            ->assertRedirect('/login');

        $this->assertGuest();
    }

    public function test_user_can_favorite_a_pet()
    {
        $user = $this->createUser();
        $pet = $this->createPet();

        Livewire::actingAs($user)
            ->test(FavoriteButton::class, ['pet' => $pet])
            ->assertSet('pet', $pet)
            ->call('toggleFavorite')
            ->assertEmitted('refresh');

        $this->assertDatabaseHas('favorites', [
            'user_id' => $user->id,
            'pet_id' => $pet->id,
        ]);
    }

    public function test_user_can_unfavorite_a_pet()
    {
        $user = $this->createUser();
        $pet = $this->createPet();

        $user->toggleFavorite($pet);

        Livewire::actingAs($user)
            ->test(FavoriteButton::class, ['pet' => $pet])
            ->assertSet('pet', $pet)
            ->call('toggleFavorite')
            ->assertEmitted('refresh');

        $this->assertDatabaseMissing('favorites', [
            'user_id' => $user->id,
            'pet_id' => $pet->id,
        ]);
    }
}
