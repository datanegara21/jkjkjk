<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth};
use App\Models\{Profile, Notification};

class NotificationController extends Controller
{
    public static function notification() {
        $user = Auth::user();
        $profile = Profile::where('email', $user->email)->first();

        $notifs = Notification::where('profile_to', $profile->id)
                              ->where('readed_at', null)
                              ->orderBy('created_at', 'desc')
                              ->get();
        return $notifs;
    }
    public function readNotification($id) {
        Notification::where('id', $id)->update(['readed_at' => now()]);
        return 'sukses';
    }
}