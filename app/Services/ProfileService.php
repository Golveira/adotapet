<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;

class ProfileService
{
    public function update(array $profileData, $image, User $user)
    {
        $user->fill([
            'name' => $profileData['name'],
            'username' => $profileData['username'],
            'email' => $profileData['email'],
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            Arr::except($profileData, ['name', 'username', 'email'])
        );

        if ($image) {
            $user->addMedia($image)->toMediaCollection('avatars');
        }
    }
}