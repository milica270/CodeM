<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Problem;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalUsers = User::count();
        $totalProblems = Problem::count();
        $totalSolutions = Solution::count();
        return view('admin.dashboard', compact('totalUsers', 'totalProblems', 'totalSolutions'));
    }
}
