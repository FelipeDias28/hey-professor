<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Closure;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function store(): RedirectResponse
    {
        Question::query()->create(
            request()->validate([
                'question' => [
                    'required',
                    'min:10',
                    function (string $attribut, mixed $value, Closure $fail) {
                        if ($value[strlen($value) - 1] != '?') { // Verificando se a última posição não é um ponto de interrogação
                            $fail('Are you Sure tath is a question? It is missing the question mark in the end.');
                        }
                    },
                ],
            ])
        );

        return to_route('dashboard');
    }
}
