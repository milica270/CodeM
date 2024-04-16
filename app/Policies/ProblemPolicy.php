<?php

namespace App\Policies;

use App\Models\Problem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProblemPolicy
{
    public function update(User $user, Problem $problem): bool
    {
        return $user->id === $problem->user->id;
    }

    public function delete(User $user, Problem $problem): bool
    {
        return $user->id === $problem->user->id;
    }

}
