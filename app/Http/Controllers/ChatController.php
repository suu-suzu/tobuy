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

        $chats = Chat::where('group_id', $group->id)->orderBy('updated_at', 'DESC')->get();
        return view('tobuys.chat')->with(['chats' => $chats, 'group' => $group]);
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
