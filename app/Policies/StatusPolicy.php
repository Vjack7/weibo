<?php

namespace App\Policies;

use App\Models\Status;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //只有用户id和删除微博作者id一致时才可以删除
    public function destroy(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }
}
