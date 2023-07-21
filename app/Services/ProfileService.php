<?php

namespace App\Services;

use App\Models\User;

class ProfileService
{
    public function update(array $profileData, User $user)
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

        $user->profile()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'whatsapp' => $profileData['whatsapp'],
            'website' => $profileData['website'],
            'bio' => $profileData['bio'],
            'location' => $profileData['location'],
        ]);
    }

    public function destroy()
    {

    }
}
