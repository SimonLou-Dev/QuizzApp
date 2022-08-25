<?php

namespace App\Policies;

use App\Models\TopicTry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicTryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, TopicTry $topicTry): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, TopicTry $topicTry): bool
    {
    }

    public function delete(User $user, TopicTry $topicTry): bool
    {
    }

    public function restore(User $user, TopicTry $topicTry): bool
    {
    }

    public function forceDelete(User $user, TopicTry $topicTry): bool
    {
    }
}
