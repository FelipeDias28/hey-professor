<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to create a new question bigger than 255 characters', function () {
    // AAA
    // Arrange - Preparar (preparar o ambiente para executar os testes)
    $user = User::factory()->create();
    actingAs($user);

    // Act - Agir
    $request = post(route('question.store', [
        'question' => str_repeat('*', 260) . '?',
    ]));

    // Assert - Verificar
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);
});

it('should check id ends with question mark ?', function () {
    // Arrange - Preparar (preparar o ambiente para executar os testes)
    $user = User::factory()->create();
    actingAs($user);

    // Act - Agir
    $request = post(route('question.store', [
        'question' => str_repeat('*', 10),
    ]));

    // Assert - Verificar
    $request->assertSessionHasErrors(
        ['question' => 'Are you Sure tath is a question? It is missing the question mark in the end.']
    );
    assertDatabaseCount('questions', 0);
});

it('should have at last 10 characteres', function () {
    // Arrange - Preparar (preparar o ambiente para executar os testes)
    $user = User::factory()->create();
    actingAs($user);

    // Act - Agir
    $request = post(route('question.store', [
        'question' => str_repeat('*', 8) . '?',
    ]));

    // Assert - Verificar
    $request->assertSessionHasErrors(
        // Ao invés de passar o texto de erro, passa a chave da validação
        ['question' => __('validation.min.string', ['min' => 10, 'attribute' => 'question'])]
    );
    assertDatabaseCount('questions', 0);
});
