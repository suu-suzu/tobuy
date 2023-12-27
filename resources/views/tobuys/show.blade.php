<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tobuy</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">tobuy詳細</h1>
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
            <p>{{ $tobuy->group_id }}</p>
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
</html>