<?php

namespace App\Policies;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Topic $topic): bool
    {
        if ($user->id == $topic->user_id) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Topic $topic): bool
    {
        if ($user->id == $topic->user_id || $user->role == 'admin') {
            return true;
        }

        return false;
    }

}
