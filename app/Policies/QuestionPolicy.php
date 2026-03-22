<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;

class QuestionPolicy
{
    /**
     * Determine if the user can update the question.
     */
    public function update(User $user, Question $question): bool
    {
        $isOwner = $user->id === $question->user_id;

        $isEmpty = $question->answers()->count() === 0 && $question->comments()->count() === 0;

        return $isOwner && $isEmpty;
    }

    /**
     * Determine if the user can delete the question.
     */
    public function delete(User $user, Question $question): bool
    {
        return $user->id === $question->user_id;
    }
}
