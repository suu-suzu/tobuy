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
            <div class='groups'>
                @foreach ($tobuys as $tobuy)
                <div class='group'>
                    <h2 class=group>
                    <a href="/tobuys/{{ $tobuy->id }}">{{ $tobuy->tobuy }}</a>
                    </h2>
                    <p class='group_id'>{{ $tobuy->group->name }}</p>
                    <p class='deadline'>{{ $tobuy->deadline }}</p>
                    <form action="/tobuys/{{ $tobuy->id }}" id="form_{{ $tobuy->id }}" method="post">
                    </form>
                @endforeach
                <a href='/tobuys/create'>追加</a>
            </div>
        </body>
    </x-app-layout>
</html>