<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Group</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <x-slot name="header">
                        <h2>グループ一覧</h2>
                    </x-slot>
                    <body>
                        <h2>所属グループ</h2>
                            <div class="items-center p-4 text-lg">
                                @foreach ($my_groups as $group)
                                    <div class="flex justify-between items-center mb-3 border-b pb-4">
                                        <a href="/chat/{{ $group->id }}">{{ $group->name }}とチャットする</a><br>
                                        <form action="/group/leave/{{ $group->id }}" id="leave_{{ $group->id }}" method="post">
                                            @csrf
                                            <button type="button" onclick="leaveGroup({{ $group->id }})" class="bg-gray-400 hover:bg-gray-300 text-white rounded px-4 py-2">退会</button>
                                        </form>
                                        <form action="/group/{{ $group->id }}" id="form_{{ $group->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        <button type="button" onclick="deleteGroup({{ $group->id }})" class="bg-red-400 hover:bg-red-300 text-white rounded px-4 py-2">削除</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <h2>グループに参加する</h2>
                            <div class="flex justify-between items-center p-4 text-lg">
                                @foreach ($groups as $group)
                                @if(!$group->users->find(Auth::id()))
                                    <h3>{{ $group->name }}</h3>
                                <form action="/group/add" method="post">
                                    @csrf
                                    <button type="submit" name="group_id" value="{{ $group->id }}" class="bg-green-500 hover:bg-green-400 text-white rounded px-4 py-2">参加申請</button>
                                </form>
                                @endif
                                @endforeach
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="flex justify-center max-w-xs mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">
                    <div class="bg-white p-6 flex justify-center items-center">
                        <div class="bg-yellow-500 hover:bg-yellow-400 text-white rounded px-4 py-2">
                        <a href="/group/create">グループ作成</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <script>
                function leaveGroup(id) {
                    'use strict'
    
                    if (confirm('本当に退会しますか？')) {
                      document.getElementById(`leave_${id}`).submit();
                    }
                }
            </script>
            <script>
                function deleteGroup(id) {
                    'use strict'
    
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                      document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
                    </body>
    </x-app-layout>
</html>



