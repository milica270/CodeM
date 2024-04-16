<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    use HandlesAuthorization;

    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function edit(User $user, User $model)
    {
        return $user->id === $model->id;
    }


}
