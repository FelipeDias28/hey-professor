[![CI Main](https://github.com/FelipeDias28/hey-professor/actions/workflows/laravel.yml/badge.svg?branch=develop)](https://github.com/FelipeDias28/hey-professor/actions/workflows/laravel.yml)
[![CI Develop](https://github.com/FelipeDias28/hey-professor/actions/workflows/laravel.yml/badge.svg?branch=develop)](https://github.com/FelipeDias28/hey-professor/actions/workflows/laravel.yml)

## Hey Professor

# Instalações

## Laravel Pint

-   Documentação
    https://laravel.com/docs/10.x/pint
-   Rodar o Pint para formatação dos arquivos

```
./vendor/bin/pint
```

-   Rodar o Pint para verificar se vai passar nos testes

```
./vendor/bin/pint --test
```

## Larastan

-   Documentação
    https://github.com/larastan/larastan
-   Rodar o Larastan

```
./vendor/bin/phpstan analyse
```

## DebugBar

-   Documentação
    https://github.com/barryvdh/laravel-debugbar

## Rodar o servidor local

### Instalação das configs

```
npm install
```

### Abrir os servidores

-   Será preciso dois terminais abertos

```
npm run dev
```

```
php artisan serve
```

# Comandos Artisan

## Rodar Servidor

```
php artisan serve
```

## Create Factory

```
php artisan make:factory
```

## Preencher banco com os seeds

```
php artisan migrate:fresh --seed
```

## Criar Seeder

```
php artisan make:seeder
```

## Criar Model

```
php artisan make:model
```

## Criar Controller

```
php artisan make:controller
```

-   Criar Controller já com nome

```
php artisan make:controller QuestionController
```

-   Criar Controller já com nome e dentro de um diretório

```
php artisan make:controller Question\LikeController
```

## Criar Request

```
php artisan make:request
```

## Criar Migration

```
php artisan make:migration
```

## Criar Policy

```
php artisan make:policy
```

# Componentes

## Utiliza o FlowBite

https://flowbite.com/docs/getting-started/introduction/

# Icones

## Utiliza o HeroIcons

https://heroicons.com/
