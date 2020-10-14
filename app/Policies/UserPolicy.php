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
    //删除用户-用户必须时管理员，并且不能删除自己
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
