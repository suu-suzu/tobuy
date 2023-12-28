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
            to buy編集
        </x-slot>
        <body>
            <h1 class='title'>to buy編集</h1>
            <div class='content'>
                <form action="/tobuys/{{ $tobuy->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="content_tobuy">
                        <h3>tobuy</h3>
                        <input type='text' name='tobuy[tobuy]' value="{{ $tobuy->tobuy }}">
                    </div>
                    <div class="content_deadline">
                        <h3>期限</h3>
                        <input type='date' name='tobuy[deadline]' value="{{ $tobuy->deadline }}">  
                    </div>
                    <div class="content_group">
                        <h3>グループ</h3>
                        <input type='select' name='tobuy[group]' value="{{ $tobuy->group_id }}">
                    </div>
                    <div class="content_memo">
                        <h3>メモ</h3>
                        <input type='text' name='tobuy[memo]' value="{{ $tobuy->memo }}">
                    </div>
                <div class="footer">
                <input type="submit" value="更新">
                <div class="footer">
                    <a href="/">戻る</a>
                </div>
            </div>
         </body>
    </x-app-layout>
</html>