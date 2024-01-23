<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Group</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            グループ一覧
        </x-slot>
        <body>
            <div class='my_groups'>
                <h2>自分の所属</h2>
                    @foreach ($my_groups as $group)
                        <a href="/chat/{{ $group->id }}">{{ $group->name }}とチャットする</a><br>
                        <form action="/group/leave/{{ $group->id }}" id="leave_{{ $group->id }}" method="post">
                            @csrf
                            <button type="button" onclick="leaveGroup({{ $group->id }})">退会</button><br>
                        </form>
                    @endforeach
            </div>
            <div class='groups'>
                <h2>グループに参加する</h2>
                    @foreach ($groups as $group)
                    @if(!$group->users->find(Auth::id()))
                        <h3>{{ $group->name }}</h3>
                    <form action="/group/add" method="post">
                        @csrf
                        <button type="submit" name="group_id" value="{{ $group->id }}">参加申請</button>
                    </form>
                    <form action="/group/{{ $group->id }}" id="form_{{ $group->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteGroup({{ $group->id }})">削除</button>
                    </form>
                    @endif
                    @endforeach
            </div>
        　  <div class='group_create'>
                <a href="/group/create">グループ作成</a>
            </div>
            <script>
                function leaveGroup(id) {
                    'use strict'
    
                    if (confirm('退会すると復元できません。\n本当に退会しますか？')) {
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



