<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Problem;

class DashboardController extends Controller
{
    public function index() {
        $problems = Problem::orderBy('created_at', 'DESC');
        if(request()->has('search')) {
            $problems = $problems->where('content', 'like', '%' . request()->get('search','') . '%');
        }
        $problems = $problems->paginate(5);
        return view('dashboard', compact('problems'));
    }
}
