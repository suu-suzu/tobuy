<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Tobuy</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <body>
                        <div class="flex flex-col justify-between items-center space-y-4">
                            <a href="/login" class="bg-blue-700 hover:bg-blue-600 text-center text-white rounded px-4 py-2 w-1/12">ログイン</a>
                            <a href="/register" class="border-blue-500 hover:bg-blue-100 border font-semibold text-center text-blue-500 rounded  px-2 py-2 w-1/12">新規登録</a>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
</html>
