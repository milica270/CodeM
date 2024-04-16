<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function profile() {
        return $this->show(auth()->user());
    }

    public function show(User $user) {
        return view('users.show',compact('user'));
    }

    public function edit(User $user) {
        Gate::authorize('edit', $user);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) {
        Gate::authorize('update', $user);
        $validated = $request->validated();
        if(request()->has('image')) {
            $imagePath = request()->file('image')->store('profile','public');
            $validated['image'] = $imagePath;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($validated);
        return redirect()->route('profile');
    }
}
