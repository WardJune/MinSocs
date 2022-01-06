<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\Friendship\AcceptNotifiation;
use App\Notifications\Friendship\NewRequestNotifiation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FriendshipController extends Controller
{
    /**
     * Show friends index
     * 
     * @return
     */
    public function index()
    {
        $user = auth()->user();
        $pending = $user->pendingFriendRequest()->take(5);
        $suggests = $user->suggestPeople()->take(10);

        return view('friends.friends', compact('pending', 'suggests'));
    }

    /**
     * Show auth user friend list
     * 
     * @return [type]
     */
    public function friends()
    {
        $friends = auth()->user()->friends();

        return view('friends.friendList', compact('friends'));
    }

    /**
     * Show suggested people
     * 
     * @return [type]
     */
    public function suggest()
    {
        $friends = auth()->user()->suggestPeople();

        return view('friends.suggest', compact('friends'));
    }

    /**
     * Show auth user friend request
     * 
     * @return [type]
     */
    public function friendRequest()
    {
        $pending = auth()->user()->pendingFriendRequest();

        return view('friends.pending', compact('pending'));
    }

    /**
     * Show auth user 
     * 
     * @return [type]
     */
    public function requestFriend()
    {
        $requestFriend = auth()->user()->sentFriendRequest();

        return view('friends.request-friend', compact('requestFriend'));
    }

    public function request(User $user)
    {
        $me = auth()->user();

        if ($user->hasRequestAsFriend($me)) {
            $me->accept($user);
            $user->notify(new AcceptNotifiation($me));
            return back();
        }

        $me->request($user);
        $user->notify(new NewRequestNotifiation($me));

        return back();
    }

    public function accept(User $user)
    {
        $me = auth()->user();
        $me->accept($user);
        $user->notify(new AcceptNotifiation($me));

        return back();
    }

    public function remove(User $user, bool $status)
    {
        auth()->user()->remove($user, $status);

        return back();
    }
}
