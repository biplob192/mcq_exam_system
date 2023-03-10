<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    public function store(array $userData): User
    {
        $user = User::create($userData);

        $user->roles()->sync($userData['roles']);

        return $user;
    }

    public function update(array $userData, User $user): User
    {
        $user->update($userData);
        $user->roles()->sync($userData['roles']);
    }
}
