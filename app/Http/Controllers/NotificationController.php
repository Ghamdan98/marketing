<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $query = auth()->user()->notifications();

        if ($request->filter == 'unread') {

            $query->whereNull('read_at');
        }

        if ($request->filter == 'read') {

            $query->whereNotNull('read_at');
        }

        $notifications = $query
            ->latest()
            ->paginate(10);

        return view(
            'admin.notifications.index',
            compact('notifications')
        );
    }

    public function read($id)
    {

        $notification = auth()
            ->user()
            ->notifications()
            ->findOrFail($id);

        if (!$notification->read_at) {

            $notification->markAsRead();
        }

        return redirect($notification->data['url']);
    }

    public function readAll()
    {

        auth()
            ->user()
            ->unreadNotifications
            ->markAsRead();

        return back();
    }
    public function destroy($id)
    {
        $notification = auth()
            ->user()
            ->notifications()
            ->findOrFail($id);

        $notification->delete();

        return back()->with('success', 'Notification deleted successfully.');
    }

    public function destroyAll()
    {
        auth()->user()->notifications()->delete();

        return back()->with('success', 'All notifications deleted.');
    }
}
