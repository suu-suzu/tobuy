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
            <div class="tobuy">
                <h3>tobuy</h3>
                <p>{{ $tobuy->tobuy }}</p>
            </div>
            <div class="deadline">
                <h3>期限</h3>
                <p>{{ $tobuy->deadline }}</p>    
            </div>
            <div class="group">
                <h3>グループ</h3>
                <a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a>
            </div>
            <div class="memo">
                <h3>メモ</h3>
                <p>{{ $tobuy->memo }}</p>
            </div>
            <div class="edit">
                <a href="/tobuys/{{ $tobuy->id }}/edit">編集</a></div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>