<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\Post\PostNotifiation;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $me = auth()->user();

        if ($me->liked($post)) {
            $me->unlike($post);
            return back();
        }

        $me->like($post);
        if ($post->user_id != $me->id) {
            $post->user->notify(new PostNotifiation($post, $me));
        }
        return back();
    }
}
