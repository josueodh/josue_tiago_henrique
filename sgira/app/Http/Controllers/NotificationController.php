<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = request()->user()->notifications;
        return view('notifications.index', compact('notifications'));
    }

    public function show(string $category)
    {
        $category = ucfirst($category);
        $notifications = request()->user()->notifications->filter(function ($notification) use ($category) {
            return $notification->data['title'] == $category;
        });
        return view('notifications.index', compact('notifications'));
    }


    public function read($notification)
    {
        $notify = request()->user()->notifications()->find($notification);
        $notify->markAsRead();
        return redirect($notify->data['route']);
    }
}
