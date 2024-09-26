<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, get};

it('shold list all questions', function () {
    // Arrage -> criar algumas perguntas
    $user      = User::factory()->create();
    $questions = Question::factory()->count(5)->create();

    actingAs($user);

    // Act -> acessar a rota
    $response = get(route('dashboard'));

    // Assert -> verificar se a lista de perguntas esta sendo mostrada
    /** @var Question $q */
    foreach ($questions as $q) { // Essa notção ai em cima diz que a variável $q é um model de Question
        $response->assertSee($q->question);
    }
});
