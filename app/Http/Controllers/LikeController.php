<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Chirp $chirp)
    {
        $chirp->likes()->syncWithoutDetaching(Auth::id());
        return back();
    }

    public function destroy(Chirp $chirp)
    {
        $chirp->likes()->detach(Auth::id());
        return back();
    }
}
