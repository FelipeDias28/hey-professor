<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\{RedirectResponse};
use Symfony\Component\HttpFoundation\Response;

class PublishController extends Controller
{
    public function __invoke(Question $question): RedirectResponse
    {
        // usuário tem autorização para publicar essa pergunta?
        $this->authorize('publish', $question);
        $question->update(['draft' => false]);

        return back();
    }
}
