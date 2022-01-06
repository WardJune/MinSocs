<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $me = auth()->user();
        $me->unreadNotifications->markAsRead();
        $notifications = $me->notifications;

        return view('notif', compact('notifications'));
    }

    public function unread()
    {
        return auth()->user()->unreadNotifications;
    }
}
