<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
            ->whereUserId(auth()->user()->id)
            ->latest()
            ->get();

        return view('profile', compact('posts'));
    }
}
