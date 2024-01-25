<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Room;
use App\Models\User;
use App\Models\Group;
use App\Events\MessageSent;
use App\Library\Message;


class ChatController extends Controller
{
    public function chat(Group $group)
    {
        $group_members = User::whereHas('groups', function ($q) use ($group){
            $q->where('application', 1)->where('group_id', $group->id);
        })->get();
        $chats = Chat::where('group_id', $group->id)->orderBy('updated_at', 'ASC')->get();
        $users =  User::whereHas('groups', function ($q) use ($group){
            $q->where('application', 0)->where('group_id', $group->id);
        })->get();
        
        return view('groups.chat')->with(['chats' => $chats, 'group' => $group, 'group_members' => $group_members, 'users' => $users]);
    }
    
    
    public function sendMessage(Chat $chat, Request $request,)
    {
        // auth()->user() : 現在認証しているユーザーを取得
        $user = auth()->user();
        $strUserId = $user->id;
        $strUsername = $user->name;

        // リクエストからデータの取り出し
        $strMessage = $request->input('message');
        
        // メッセージオブジェクトの作成
        $message = new Message;
        $message->body = $strMessage;
        $message->group_id = $request->input('group_id');
        
        $message->userName = $strUsername;
        MessageSent::dispatch($message);
        
        // データベースの保存処理
        $chat->send_to = $strUserId;
        $chat->message = $strMessage;
        $chat->group_id = $request->input('group_id');
        $chat->save();
        
        return response()->json(['message' => 'Message sent successfully']);
            
        }
        
}
