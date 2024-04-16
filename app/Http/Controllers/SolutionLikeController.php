<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solution;

class SolutionLikeController extends Controller
{
    public function like(Solution $solution) {
        $liker = auth()->user();
        $liker->likes()->attach($solution);
        return redirect()->route('dashboard');
    }

    public function unlike(Solution $solution) {
        $liker = auth()->user();
        $liker->likes()->detach($solution);
        return redirect()->route('dashboard');
    }

}
