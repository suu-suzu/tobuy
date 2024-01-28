<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Group</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-slot name="header">
                        <h2>グループ作成</h2>
                    </x-slot>
                    <body>
                        <div class="flex items-center justify-center">
                        <form action="/group" method="POST">
                            @csrf
                            <input type="text" name="group[name]"/>
                            <input class="bg-yellow-500 hover:bg-yellow-400 text-white rounded px-4 py-2" type="submit" value="作成"/>
                        </form>
                        </div>
                        <div class="footer flex items-center">
                        <a href="/group" class="bg-gray-300 hover:bg-gray-200 text-black rounded px-4 py-2 my-2 block">戻る</a>
                        </div>
                        
                    </body>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>
</html>