<?php

use App\Models\Question;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('should be able to list all question created by me', function () {
    $wrongUser = User::factory()->create();
    $wrongQuestions = Question::factory()
        ->for($wrongUser, 'createdBy')
        ->count(10)
        ->create();

    $user = User::factory()->create();
    $questions = Question::factory()
        ->for($user, 'createdBy')
        ->count(10)
        ->create();

    actingAs($user);
    $response = get(route('question.index'));

    // Eu quero ver as perguntas que eu criei
    /** @var Question $q */
    foreach ($questions as $q) {
        $response->assertSee($q->question);
    }

    // Eu não quero ver as perguntas que eu não criei
    /** @var Question $q */
    foreach ($wrongQuestions as $q) {
        $response->assertDontSee($q->question);
    }
});
