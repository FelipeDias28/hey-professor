<?php

use App\Http\Controllers\{DashboardController, ProfileController, Question, QuestionController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (app()->isLocal()) {
        auth()->loginUsingId(1); // loga com o usuário de ID 1

        return to_route('dashboard');
    }

    return view('welcome');
});

// Esse controller tem um __invoke( ) dentro dele, ou seja, somente uma função
Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');

Route::post('/question/like/{question}', Question\LikeController::class)->name('question.like');
Route::post('/question/unlike/{question}', Question\UnlikeController::class)->name('question.unlike');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
