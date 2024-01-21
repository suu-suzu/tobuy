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
        <x-slot name="header">
            to buy詳細
        </x-slot>
        <body>
        <table class="tobuy">
                <thead>
                    <tr>
                        <th>tobuy</th>
                        <th>期限</th>
                        <th>個数</th>
                        <th>グループ</th>
                        <th>メモ</th>
                    </tr>
                </thead>
            <tbody>
                <tr>
                    <div class="tobuy">
                      <td><p>{{ $tobuy->tobuy }}</p></td>
                    </div>
                    <div class="deadline">
                       <td><p>{{ $tobuy->deadline }}</p></td>   
                    </div>
                    <div class='count'>
                       <td> <p>{{ $tobuy->count }}</p></td>
                    </div>
                    <div class="group">
                        <td><a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a></td>
                    </div>
                    <div class="memo">
                        <td><p>{{ $tobuy->memo }}</p></td>
                    </div>
                    <div class="edit">
                        <td><a href="/tobuys/{{ $tobuy->id }}/edit">編集</a></td>
                    </div>
                </tr>
            </tbody>
            </table>
            <div class="footer">
                <a href="/index">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>