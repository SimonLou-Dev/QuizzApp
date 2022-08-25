<?php

namespace App\Policies;

use App\Models\question;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class questionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, question $question): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, question $question): bool
    {
    }

    public function delete(User $user, question $question): bool
    {
    }

    public function restore(User $user, question $question): bool
    {
    }

    public function forceDelete(User $user, question $question): bool
    {
    }
}
