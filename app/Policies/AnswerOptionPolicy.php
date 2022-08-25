<?php

namespace App\Policies;

use App\Models\AnswerOption;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerOptionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, AnswerOption $answerOption): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, AnswerOption $answerOption): bool
    {
    }

    public function delete(User $user, AnswerOption $answerOption): bool
    {
    }

    public function restore(User $user, AnswerOption $answerOption): bool
    {
    }

    public function forceDelete(User $user, AnswerOption $answerOption): bool
    {
    }
}
