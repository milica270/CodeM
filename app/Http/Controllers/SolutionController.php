<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\Solution;

class SolutionController extends Controller
{
    public function store(Problem $problem) {
        $solution = new Solution();
        $solution->problem_id = $problem->id;
        $solution->user_id = auth()->user()->id;
        $solution->content = request()->get('content');
        $solution->save();
        return redirect()->route('dashboard');
    }
}
