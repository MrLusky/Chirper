<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        if ($user->id !== Auth::id()) {
            Auth::user()->following()->syncWithoutDetaching($user->id);
        }

        return back();
    }

    public function unfollow(User $user)
    {
        Auth::user()->following()->detach($user->id);
        return back();
    }
}
