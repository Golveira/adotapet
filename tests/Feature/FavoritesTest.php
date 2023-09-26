<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
