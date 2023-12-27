<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Tobuy</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class='title'>tobuy一覧</h1>
        <div class='tobuys'>
            @foreach ($tobuys as $tobuy)
            <div class='tobuy'>
                <h2 class='tobuy'>
                <a href="/tobuys/{{ $tobuy->id }}">{{ $tobuy->tobuy }}</a>
                </h2>
                <p class='deadline'>{{ $tobuy->deadline }}</p>
                <p class='group_id'>{{ $tobuy->group_id }}</p>
            @endforeach
            <a href='/tobuys/create'>追加</a>
            </div>
        </div>
    </body>
</html>