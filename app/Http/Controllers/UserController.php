<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        if ($user == auth()->user()) {
            return redirect()->route('profile');
        }

        $user = $user->load('posts');
        return view('users.show', compact('user'));
    }
}
