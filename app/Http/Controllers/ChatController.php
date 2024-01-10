<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Room;
use App\Models\User;
use App\Models\Group;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function chat(User $user, Chat $message)
    {

        $myUserId = auth()->user()->id;
        $otherUserId = $user->id;
        
        $chat = Room::where(function($query) use ($myUserId,$otherUserId) {
            $query->where('send_to', $myUserId)
                ->where('group_id', $otherUserId);
        })->orWhere(function($query) use ($myUserId, $otherUserId) {
            $query->where('send_to', $otherUserId)
                ->where('group_id', $myUserId);
        })->first();
        
        if (!$chat) {
            $chat = new Room();
            $chat->group_id = $myUserId;
            $chat->send_to = $otherUserId;
            $chat->save();
        }
        
        
            $messages = Chat::where('group_id', $chat->id)->orderBy('updated_at', 'DESC')->get();;


        return view('tobuys.chat')->with(['chat' => $chat, 'message' => $message]);
    }
}
