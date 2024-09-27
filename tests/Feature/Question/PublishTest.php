<?php

use App\Models\{Question, User};

use function Pest\Laravel\{actingAs, put};

it('should be able to publish a question', function () {
    $user     = User::factory()->create();
    $question = Question::factory()->create(['draft' => true]);

    actingAs($user);

    put(route('question.publish', $question))
        ->assertRedirect();

    $question->refresh();
    expect($question->draft)->toBe(0);
});

it('should make sure that only the person who created the question can publish it', function () {
    $rigthUser     = User::factory()->create();
    $wrongUser     = User::factory()->create();
    $question = Question::factory()->create([
        'draft' => true,
        'created_by' => $rigthUser->id,
    ]);

    actingAs($wrongUser);
    put(route('question.publish', $question))
        ->assertForbidden(); // Status de não permitido, porque esta logado com o usuário errado que não criou a pergunta

    actingAs($rigthUser);
    put(route('question.publish', $question))
        ->assertRedirect();
});
