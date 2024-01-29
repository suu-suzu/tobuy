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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <x-slot name="header">
                        <h2>to buy編集</h2>
                    </x-slot>
                    <body>
                    <div class="flex items-center justify-center">
                        <form action="/tobuys/{{ $tobuy->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="content_tobuy">
                                <h2>tobuy*</h2>
                                <input type='text' name='tobuy[tobuy]' value="{{ $tobuy->tobuy }}">
                                <p class="tobuy__error" style="color:red">{{ $errors->first('tobuy.tobuy') }}</p>
                            </div>
                            <div class="content_deadline">
                                <h2>期限*</h2>
                                <input type='date' name='tobuy[deadline]' value="{{ $tobuy->deadline }}">
                                <p class="deadline__error" style="color:red">{{ $errors->first('tobuy.deadline') }}</p>
                            </div>
                            <div class="content_count">
                                <h2>個数*</h2>
                                <input type="number" name="tobuy[count]" step="1" min="1" value="{{ $tobuy->count }}">
                                <p class="count__error" style="color:red">{{ $errors->first('tobuy.count') }}</p>
                            </div>
                            <div class="content_group">
                                <h2>グループ*</h2>
                                <select name="tobuy[group_id]">
                                    @foreach($my_groups as $group)
                                         <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="content_memo">
                                <h2>メモ</h2>
                                <textarea id="memo" name="tobuy[memo]" value="{{ $tobuy->memo }}" placeholder="メモ" maxlength="30"></textarea>
                                <style>
                                    #memo {
                                        resize: none;
                                    }
                                </style>
                            </div>
                            <input class="bg-blue-400 hover:bg-blue-300 text-white rounded px-4 py-2" type="submit" value="更新">
                            <div class="footer flex items-center">
                                <a href="/index" class="bg-gray-300 hover:bg-gray-200 text-black rounded px-4 py-2 my-2 block">戻る</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    </body>
    </x-app-layout>
</html>