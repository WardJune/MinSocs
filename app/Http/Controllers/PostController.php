<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $me = auth()->user();
        $friends = $me->friends()->pluck(['id']);
        $friends[] = $me->id;

        $posts = Post::with('user')
            ->whereIn('user_id', $friends)
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

    public function show(Post $post)
    {
        $post = $post->load('user')->loadCount('likes');

        return view('posts.show', compact('post'));
    }
}
