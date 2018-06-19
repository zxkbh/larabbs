<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    /*
        $currentUser 当前登陆用户
        $user 编辑的用户
    */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
