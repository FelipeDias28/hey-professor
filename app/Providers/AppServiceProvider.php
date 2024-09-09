<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // todos os models serão desprotegidos
        // Tomar bastante cuidado para validar todos os dados
        Model::unguard();

        // Adicionado essa prevenção somente quando o app não for produção
        // Pois só mostrará o erro no ambiente de desenvolvimento
        Model::preventLazyLoading(!app()->isProduction());
    }
}
