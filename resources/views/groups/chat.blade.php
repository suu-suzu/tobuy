<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $group->name}}
        </h2>
    </x-slot>
    <div class="grid grid-cols-3 grid-rows-2 gap-4">
        <div class="col-span-1 row-span-1">
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h2>グループメンバー</h2>
                                @foreach ($group_members as $group_member)
                                    <li>{{ $group_member->name }}</li>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 row-span-2">
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 ">
                            <ul class="list-disc overflow-y-scroll h-96" id="list_message">
                                @foreach ($chats as $chat)
                                    <li>
                                        <strong>{{ $chat->user->name }}:</strong>
                                        <div>{{ $chat->message }}</div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="flex items-center">
                                <form method="POST" onsubmit="onsubmit_Form(); return false;" action="/chat" >
                                    <div class="flex items-center space-x-4 mt-4 mb-4"> 
                                        @csrf
                                        メッセージ :<textarea id="input_message" autocomplete="off" cols="30" rows="1" class="ml-4"></textarea>
                                        <style>
                                            #input_message {
                                                resize: none;
                                            }
                                        </style>
                                        <input type="hidden" id="group_id" name="chat_id" value="{{ $group->id }}"> 
                                        <button type="submit" class="bg-blue-400 hover:bg-blue-300 text-white rounded px-4 py-2">送信</button>
                                    </div>
                                </form>
                            </div>
                            <div class="footer">
                                <a href="/group" class="bg-gray-300 hover:bg-gray-200 text-black rounded px-4 py-2">戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-span-1 row-span-1">     
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>申請中メンバー</h2>
                        <div class="flex justify-between items-center p-4 text-lg">
                        @foreach($users as $user)
                            <div class="flex justify-between items-center mb-3 border-b pb-4">
                                <div class="flex h-10">
                                    <p class="mr-10 py-2">{{ $user->name }}</p>
                                    <form action="/group/permission/{{$user->id}}/{{ $group->id}}" method="post">
                                        @csrf
                                        <button class="bg-red-400 hover:bg-red-300 text-white rounded px-4 py-2 mx-5">許可</button>
                                    </form>
                                    <form action="/group/permissionReject/{{$user->id}}/{{ $group->id}}" method="post">
                                        @csrf
                                        <button class="bg-blue-600 hover:bg-blue-500 text-white rounded px-4 py-2">許可しない</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const elementInputMessage = document.getElementById("input_message");
    const chatId = document.getElementById("group_id").value;
        
        {{-- formのsubmit処理 --}}
        function onsubmit_Form()
        {
            
            {{-- 送信用テキストHTML要素からメッセージ文字列の取得 --}}
            let strMessage = elementInputMessage.value;
            if( !strMessage )
            {
                return;
            }
            params = { 
                'message': strMessage,
                'group_id': chatId
            };
            
            {{-- POSTリクエスト送信処理とレスポンス取得処理 --}}
            axios
                .post( '/chat', params )
                .then( response => {
                    console.log(response);
                    console.log(chatId)
                } )
                .catch(error => {
                    console.log(error.response)
                } );
            {{-- テキストHTML要素の中身のクリア --}}
            elementInputMessage.value = "";
        }
         window.addEventListener("DOMContentLoaded", () => {
            const elementListMessage = document.getElementById("list_message");
            
            
            // Listen開始と、イベント発生時の処理の定義
            window.Echo.private('chat').listen('MessageSent', (e) => {
                console.log(e);
                
                // 受け取ったメッセージのchat_idがこのページのchat_idと一致する場合のみ表示
                if (e.message.group_id === chatId) {
                    let strUsername = e.message.userName;
                    let strMessage = e.message.body;
        
                    let elementLi = document.createElement("li");
                    let elementUsername = document.createElement("strong");
                    let elementMessage = document.createElement("div");
                    elementUsername.textContent = strUsername;
                    elementMessage.textContent = strMessage;
                    elementLi.append(elementUsername);
                    elementLi.append(elementMessage);
                    elementListMessage.append(elementLi); // リストの一番上に追加
                }
            });
        });
    </script>
</x-app-layout>