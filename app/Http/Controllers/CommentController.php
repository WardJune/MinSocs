<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'comment' => $request->comment
        ]);

        return back();
    }
}
