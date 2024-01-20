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
                    <div class="content_count">
                        <h3>個数</h3>
                        <input type="number" name="tobuy[count]" step="1" min="1" value="{{ $tobuy->count }}">
                    </div>
                    <div class="content_group">
                        <h3>グループ</h3>
                        <select name="tobuy[group_id]">
                            @foreach($groups as $group)
                                 <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="content_memo">
                        <h3>メモ</h3>
                        <input type='text' name='tobuy[memo]' value="{{ $tobuy->memo }}">
                    </div>
                <div class="footer">
                <input type="submit" value="更新">
                <div class="footer">
                    <a href="/index">戻る</a>
                </div>
            </div>
         </body>
    </x-app-layout>
</html>