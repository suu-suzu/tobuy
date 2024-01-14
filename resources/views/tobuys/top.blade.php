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
            <a href="/register">新規登録</a>
            <a href="/login">ログイン</a>
        </body>
    </x-app-layout>
</html>