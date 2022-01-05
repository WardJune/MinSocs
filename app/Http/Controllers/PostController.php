<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
            ->latest()
            ->get();

        return view('home', compact('posts'));
    }

    public function store(Request $request)
    {
        auth()->user()->posts()->create([
            'content' => $request->content
        ]);

        return redirect()->route('home');
    }
}
