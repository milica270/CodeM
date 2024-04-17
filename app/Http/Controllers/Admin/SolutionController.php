<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index() {
        $solutions = Solution::latest()->paginate(15);

        return view('admin.solutions.index', compact('solutions'));
    }

    public function destroy(Solution $solution) {
        $solution->delete();
        return redirect()->route('admin.solutions');
    }

}
