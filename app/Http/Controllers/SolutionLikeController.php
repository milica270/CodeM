<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;

class SolutionLikeController extends Controller
{
    public function like(Request $request) {
        $liker = auth()->user();
        $liker->likes()->attach($request->solution_id);
        return 1;
    }

    public function unlike(Request $request) {
        $liker = auth()->user();
        $liker->likes()->detach($request->solution_id);
        return 1;
    }

}
