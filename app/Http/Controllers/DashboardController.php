<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    // Quando só tem uma função não precisa passar método no web.php

    public function __invoke(): View
    {
        return view('dashboard', [
            'questions' => Question::all(),
        ]);
    }
}
