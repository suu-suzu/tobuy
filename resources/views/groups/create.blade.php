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
            グループ作成
        </x-slot>
        <body>
            <form action="/group" method="POST">
                @csrf
                <input type="text" name="group[name]"/>
                <input type="submit" value="作成"/>
            </form>
        </body>
    </x-app-layout>
</html>