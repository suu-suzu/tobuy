<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                        <h2>to buy詳細</h2>
                    </x-slot>
                    <body>
                        <table class="tobuy">
                            <thead>
                                <tr>
                                    <th width="150"><h2>tobuy</h2></th>
                                    <th width="150"><h2>期限</h2></th>
                                    <th width="150"><h2>個数</h2></th>
                                    <th width="150"><h2>グループ</h2></th>
                                    <th width="150"><h2>メモ</h2></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center"><p>{{ $tobuy->tobuy }}</p></td>
                                    <td align="center"><p>{{ $tobuy->deadline }}</p></td>   
                                    <td align="center"><p>{{ $tobuy->count }}</p></td>
                                    <td align="center"><a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a></td>
                                    <td align="center"><p>{{ $tobuy->memo }}</p></td>
                                    <td><a href="/tobuys/{{ $tobuy->id }}/edit" class="bg-gray-400 hover:bg-gray-300 text-white rounded px-4 py-2 ml-40 flex">編集</a></td>
                                </tr>
                            </tbody>
                        </table>
                            <div class="footer flex items-center">
                                <a href="/index" class="bg-gray-300 hover:bg-gray-200 text-black rounded px-4 py-2 my-2">戻る</a>
                            </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
</html>