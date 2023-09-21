<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_anyone_can_see_a_user_profile()
    {
        $user = $this->createUser();

        $this->get(route('profile.show', $user->username))
            ->assertOk()
            ->assertSee($user->name)
            ->assertSee($user->email)
            ->assertSee($user->address)
            ->assertSee($user->website)
            ->assertSee($user->whatsapp)
            ->assertSee($user->bio);
    }
}
