<?php

namespace App\Policies;

use App\Models\QuestionOption;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionOptionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, QuestionOption $questionOption): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, QuestionOption $questionOption): bool
    {
    }

    public function delete(User $user, QuestionOption $questionOption): bool
    {
    }

    public function restore(User $user, QuestionOption $questionOption): bool
    {
    }

    public function forceDelete(User $user, QuestionOption $questionOption): bool
    {
    }
}
