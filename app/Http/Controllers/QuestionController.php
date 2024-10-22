<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Closure;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function index()
    {
        return view('question.index', [
            'questions' => user()->questions
        ]);
    }

    public function store(): RedirectResponse
    {
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
        ]);

        user()
            ->questions()
            ->create([
                'question' => request()->question,
                'draft'    => true,
            ]);

        return to_route('dashboard');
    }
}
