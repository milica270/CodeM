<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friendship;
use App\Models\User;

class FriendshipController extends Controller
{
    public function sendRequest(User $user) {
        $friendship1 = Friendship::create([
            'user_id' => auth()->id(),
            'friend_id' => $user->id,
            'accepted' => false,
        ]);


        return redirect()->route('users.show', compact('user'));
    }

    public function unsendRequest(User $user) {
        Friendship::where('user_id', auth()->id())
            ->where('friend_id', $user->id)
            ->delete();


        return redirect()->route('users.show', compact('user'));
    }

    public function acceptRequest(User $user) {

        $friendship1 = Friendship::where('user_id', $user->id)
            ->where('friend_id', auth()->id())
            ->update(['accepted' => true]);


        return redirect()->route('friendship.showFriendRequests');
        
    }

    public function unacceptRequest(User $user) {

        Friendship::where('user_id', $user->id)
            ->where('friend_id', auth()->id())
            ->delete();

        return redirect()->route('friendship.showFriendRequests');
    }

    public function showFriendRequests()
    {
        $user = auth()->user();
        $friendRequests = $user->friendships2()->where('accepted', false)->get();

        return view('users.friend_requests', compact('friendRequests'));
    }

    public function destroy(User $user) {
        $friendship = auth()->user()->friendships1()->where('friend_id', $user->id)->first();
        if (!$friendship) {
            $friendship = auth()->user()->friendships2()->where('user_id', $user->id)->first();
        }

        if ($friendship) {
            $friendship->delete();
        }
            return redirect()->route('users.show', compact('user'));
    }

    public function showFriends() {
        $user = auth()->user();
        $friends = $user->friendships1()->where('accepted', true)->get();
        $friends = $friends->merge($user->friendships2()->where('accepted', true)->get());
        return view('users.friends', compact('friends'));
    }


    
}
