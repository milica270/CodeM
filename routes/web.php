<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProblemController as AdminProblemController;
use App\Http\Controllers\Admin\SolutionController as AdminSolutionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\SolutionLikeController;
use Illuminate\Support\Facades\Route;


Route::get('/lang/{lang}', function($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');

Route::middleware(['SetLocale'])->group(function () {

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/terms', function(){
    return view('terms');
})->name('terms');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/profile/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('profile/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('profile/{user}/update', [UserController::class, 'update'])->name('users.update')->middleware('auth');

Route::post('/problems', [ProblemController::class, 'store'])->middleware('auth')->name('problems.store');
Route::get('/problems/{problem}', [ProblemController::class, 'show'])->middleware('auth')->name('problems.show');
Route::get('/problems/{problem}/edit', [ProblemController::class, 'edit'])->middleware('auth')->name('problems.edit');
Route::put('/problems/{problem}', [ProblemController::class, 'update'])->middleware('auth')->name('problems.update');
Route::delete('/problems/{problem}', [ProblemController::class, 'destroy'])->middleware('auth')->name('problems.destroy');


Route::post('/problems/{problem}/solutions', [SolutionController::class, 'store'])->middleware('auth')->name('problems.solutions.store');


Route::post('/friendship/send-request/{user}', [FriendshipController::class, 'sendRequest'])->name('friendship.sendRequest')->middleware('auth');
Route::delete('/friendship/unsend-request/{user}', [FriendshipController::class, 'unsendRequest'])->name('friendship.unsendRequest')->middleware('auth');
Route::put('/friendship/accept-request/{user}', [FriendshipController::class, 'acceptRequest'])->name('friendship.acceptRequest')->middleware('auth');
Route::delete('/friendship/unaccept-request/{user}', [FriendshipController::class, 'unacceptRequest'])->name('friendship.unacceptRequest')->middleware('auth');
Route::get('/friends', [FriendshipController::class, 'showFriends'])->name('friendship.showFriends')->middleware('auth');
Route::get('/requests', [FriendshipController::class, 'showFriendRequests'])->name('friendship.showFriendRequests')->middleware('auth');
Route::delete('/friendship/delete/{user}', [FriendshipController::class, 'destroy'])->name('friendship.delete')->middleware('auth');

Route::post('/solutions/like', [SolutionLikeController::class, 'like'])->name('solutions.like')->middleware('auth');
Route::post('/solutions/unlike', [SolutionLikeController::class, 'unlike'])->name('solutions.unlike')->middleware('auth');


Route::get('/allproblems', function(){
    return view('users.problems');
})->name('problems.showAll')->middleware('auth');

Route::get('/allsolutions', function(){
    return view('users.solutions');
})->name('solutions.showAll')->middleware('auth');


Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/problems', [AdminProblemController::class, 'index'])->name('problems');
    Route::get('/solutions', [AdminSolutionController::class, 'index'])->name('solutions');
    Route::delete('solutions/{solution}', [AdminSolutionController::class, 'destroy'])->name('solutions.destroy');
});

});


