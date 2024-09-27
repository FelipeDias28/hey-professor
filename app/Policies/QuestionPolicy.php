<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionPolicy
{

    public function publish(User $user, Question $question): bool
    {
        // O is() é uma função que verifica se dois models possuem o mesmo ID e pertencem a mesma tabela
        // created_by é um User e o $user também é um User, ou seja, pertencem a mesma tabela
        return $question->createdBy->is($user);
    }
}
