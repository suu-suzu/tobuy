<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Tobuy</title>
    </head>
    <body>
        <h1>リスト作成</h1>
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
            <!--<div class="group">-->
            <!--    <h2>グループ</h2>-->
            <!--    <input type="select" name="tobuy[group]" placeholder="グループ１"/>-->
            <!--</div>-->
            <div class="memo">
                <h2>メモ</h2>
                <textarea name="tobuy[memo]" placeholder="メモ"></textarea>
            </div>
            <input type="submit" value="登録"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>