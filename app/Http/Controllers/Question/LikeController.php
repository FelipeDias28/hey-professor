<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\{Question, User};
use Illuminate\Http\{RedirectResponse};

class LikeController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        // Mais Fácil a leitura: Usuário autenticado deu like na pergunta
        $user->like($question);

        return back(); // Retorna para a página de onde saiu
    }
}
