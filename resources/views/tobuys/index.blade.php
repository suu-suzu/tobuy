<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Tobuy</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <x-slot name="header">
                        <h2>to buy一覧</h2>
                    </x-slot>
                    <body>
                        <table class="tobuy">
                            <thead>
                                <tr>
                                    <th width="150"><h2>tobuy</h2></th>
                                    <th width="150"><h2>期限</h2></th>
                                    <th width="150"><h2>個数</h2></th>
                                    <th width="150"><h2>グループ</h2></th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class='tobuys'>
                                    @foreach ($tobuys as $tobuy)
                                        <tr>
                                            <div class='touby'>
                                                <td height="50" align="center"><a href="/tobuys/{{ $tobuy->id }}/show">{{ $tobuy->tobuy }}</a></td>
                                                <td align="center"><p class='deadline'>{{ $tobuy->deadline }}</p></td>
                                                <td align="center"><p class='count'>{{ $tobuy->count }}</p></td>
                                                <td align="center"><a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a></td>
                                                <td><a href="/tobuys/{{ $tobuy->id }}/edit" class="bg-gray-400 hover:bg-gray-300 text-white rounded px-4 py-2 mx-20 flex">編集</a></td>
                                                <td><form action="/tobuys/{{ $tobuy->id }}" id="form_{{ $tobuy->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="deleteTobuy({{ $tobuy->id }})" class="bg-red-400 hover:bg-red-300 text-white rounded px-4 py-2 mx-20">削除</button>
                                                    </form>
                                                </td>
                                            </div>
                                        </tr>
                                    @endforeach
                                </div>
                            </tbody>
                        </table>
                            <div class="flex flex-row-reverse">
                                <a href='/tobuys/create' class="bg-yellow-500 hover:bg-yellow-400 text-white rounded px-4 py-2">追加</a>
                            </div>
                            <div class="paginate">
                                <div>{{ $tobuys->links() }}</div>
                            </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
        <script>
            function deleteTobuy(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか?')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </x-app-layout>
</html>