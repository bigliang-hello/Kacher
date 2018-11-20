<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasRole('Admin') || $user->hasRole('Manager')) {
            return true;
        }
    }
}
