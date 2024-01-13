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
                @foreach ($groups as $group)
                    <a href="/chat/{{ $group->id }}">{{ $group->name }}とチャットする</a>
                @endforeach
            </div>
        </body>
    </x-app-layout>
</html>