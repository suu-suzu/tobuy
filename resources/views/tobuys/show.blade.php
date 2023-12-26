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
        <h1 class="tobuy">
            <h3>tobuy</h3>
            <p>{{ $tobuy->tobuy }}</p>
        </h1>
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
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>