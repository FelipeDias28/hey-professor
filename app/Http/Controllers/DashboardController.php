<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Quando só tem uma função não precisa passar método no web.php

    public function __invoke()
    {
        return view('dashboard', [
            'questions' => Question::all(),
        ]);
    }
}
