<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_settings_page_is_displayed(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->get('/settings')
            ->assertOk()
            ->assertSee($user->name)
            ->assertSee($user->username)
            ->assertSee($user->email)
            ->assertSee($user->whatsapp)
            ->assertSee($user->website)
            ->assertSee($user->bio);
    }

    public function test_user_can_update_profile(): void
    {
        $user = $this->createUser();
        $params = $this->validParams();

        $this->actingAs($user)
            ->put(route('settings.profile.update'), $params);

        $this->assertDatabaseHas('users', $params);
    }

    public function test_user_can_update_password(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->put(route('settings.password.update'), [
                'current_password' => 'password',
                'password' => 'newpassword',
                'password_confirmation' => 'newpassword',
            ])
            ->assertRedirect();

        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    public function test_user_can_delete_their_account(): void
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->delete(route('settings.profile.destroy'))
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    private function validParams(): array
    {
        return Arr::except(User::factory()->make()->toArray(), ['email_verified_at']);
    }
}
