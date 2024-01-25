<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Tobuy</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <x-slot name="header">
            to buy一覧
        </x-slot>
        <body>
            <table class="tobuy">
                <thead>
                    <tr>
                        <th>tobuy</th>
                        <th>期限</th>
                        <th>個数</th>
                        <th>グループ</th>
                    </tr>
                </thead>
                <tbody>
                <div class='tobuys'>
                    @foreach($groups as $group)
                    @foreach ($group->tobuys as $tobuy)
                    <tr>
                        <div class='tobuy'>
                            <h2 class='tobuy'>
                            <td><a href="/tobuys/{{ $tobuy->id }}/show">{{ $tobuy->tobuy }}</a></td>
                            </h2>
                                <td><p class='deadline'>{{ $tobuy->deadline }}</p></td>
                                <td><p class='count'>{{ $tobuy->count }}</p></td>
                                <td><a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a></td>
                            <div class="edit">
                                <td><a href="/tobuys/{{ $tobuy->id }}/edit">編集</a></td>
                            </div>
                            <td><form action="/tobuys/{{ $tobuy->id }}" id="form_{{ $tobuy->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteTobuy({{ $tobuy->id }})">削除</button>
                            </form></td>
                        </div>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
                <a href='/tobuys/create'>追加</a>
                <div class='paginate'>
                </div>
                <script>
                    function deleteTobuy(id) {
                        'use strict'
                        if (confirm('削除すると復元できません。\n本当に削除しますか?')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
                </div>
            </div>
        </body>
    </x-app-layout>
</html>