<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;

class ProfileService
{
    public function update(array $profileData, $image, User $user)
    {
        $user->update([
            'name' => $profileData['name'],
            'username' => $profileData['username']
        ]);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            Arr::except($profileData, ['name', 'username', 'avatar'])
        );

        if ($image) {
            $user->addMedia($image)->toMediaCollection('avatars');
        }
    }
}