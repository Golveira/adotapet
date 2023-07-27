<?php

namespace App\Policies;

use App\Models\Pet;
use App\Models\User;

class PetPolicy
{
    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Pet $pet): bool
    {
        return $pet->user->is($user);
    }

    public function delete(User $user, Pet $pet): bool
    {
        return $pet->user->is($user);
    }
}