<?php
// Aqui dentro criação de funções globais para me ajudar em todo o sistema

use App\Models\User;

// Retorna a model ou null
function user(): ?User
{
    if (auth()->user()) {
        return auth()->user();
    }

    return null;
    ;
}
