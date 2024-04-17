<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    public function index() {
        $problems = Problem::latest()->paginate(15);

        return view('admin.problems.index', compact('problems'));
    }
}
