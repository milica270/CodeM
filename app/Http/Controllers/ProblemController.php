<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProblemRequest;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class ProblemController extends Controller
{
    public function store(StoreProblemRequest $request) {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        Problem::create($validated);
        return redirect()->route('dashboard');
    }

    public function destroy(Problem $problem) {
        Gate::authorize('delete', $problem);
        $problem->solutions()->delete();
        $problem->delete();
        return redirect()->route('dashboard');
    }

    public function show(Problem $problem) {
        return view('problems.show', compact('problem'));
    }

    public function edit(Problem $problem) {
        Gate::authorize('update', $problem);
        return view('problems.edit', compact('problem'));
    }

    public function update(StoreProblemRequest $request, Problem $problem) {
        Gate::authorize('update', $problem);
        $validated = $request->validated();
        $problem->update($validated);
        return redirect()->route('problems.show', compact('problem'));
    }

    
}
