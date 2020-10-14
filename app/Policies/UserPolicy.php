<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    //用户只可以编辑自己的信息
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
