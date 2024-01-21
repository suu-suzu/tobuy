<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Tobuy</title>
    </head>
    <x-app-layout>
        <x-slot name="header">
            to buyリスト作成
        </x-slot>
        <body>
            <form action="/tobuys" method="POST">
                @csrf
                <div class="tobuy">
                    <h2>to buy</h2>
                    <input type="text" name="tobuy[tobuy]" placeholder="買うものを入力"/>
                </div>
                <div class="deadline">
                    <h2>期限</h2>
                    <input type="date" name="tobuy[deadline]"/>
                </div>
                <div class="count">
                    <h2>個数</h2>
                    <input type="number" name="tobuy[count]" step="1" min="1">
                </div>
                <div class="group">
                    <h2>グループ</h2>
                    <select name="tobuy[group_id]" >
                         @foreach($groups as $group)
                             <option value="{{ $group->id }}">{{ $group->name }}</option>
                         @endforeach
                    </select>
                </div>
                <div class="memo">
                    <h2>メモ</h2>
                    <textarea name="tobuy[memo]" placeholder="メモ"></textarea>
                </div>
                <input type="submit" value="登録"/>
            </form>
            <div class="footer">
                <a href="/index">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>