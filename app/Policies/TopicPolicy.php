<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Topic $topic): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Topic $topic): bool
    {
    }

    public function delete(User $user, Topic $topic): bool
    {
    }

    public function restore(User $user, Topic $topic): bool
    {
    }

    public function forceDelete(User $user, Topic $topic): bool
    {
    }
}
