<!--グループごとのToBuy-->
<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white">
                <x-slot name="header">
                    <h2>グループごとのto buy一覧</h2>
                </x-slot>
                <body>
                    <table class="tobuy">
                        <thead>
                            <tr>
                                <th width="150"><h2>tobuy</h2></th>
                                <th width="150"><h2>期限</h2></th>
                                <th width="150"><h2>個数</h2></th>
                                <th width="150"><h2>グループ</h2></th>
                            </tr>
                        </thead>
                        <tbody>
                        <div class='tobuys'>
                            @foreach ($tobuys as $tobuy)
                            <tr>
                                <div class='tobuy'>
                                    <td height="50" align="center"><a href="/tobuys/{{ $tobuy->id }}/show">{{ $tobuy->tobuy }}</a></td>
                                    <td align="center"><p class='deadline'>{{ $tobuy->deadline }}</p></td>
                                    <td align="center"><p class='count'>{{ $tobuy->count }}</p></td>
                                    <td align="center"><a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a></td>
                                    <div class="edit">
                                    <td><a href="/tobuys/{{ $tobuy->id }}/edit" class="bg-gray-400 hover:bg-gray-300 text-white rounded px-4 py-2 mx-20 flex">編集</a></td>
                                    </div>
                                    <form action="/tobuys/{{ $tobuy->id }}" id="form_{{ $tobuy->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <td><button type="button" onclick="deleteTobuy({{ $tobuy->id }})" class="bg-red-400 hover:bg-red-300 text-white rounded px-4 py-2 mx-20">削除</button></td>
                                    </form>
                                </div>
                            </tr>
                            @endforeach
                           </div>
                        </tbody>
                    </table>
                        <div class="footer flex items-center">
                            <a href="/index" class="bg-gray-300 hover:bg-gray-200 text-black rounded px-4 py-2 my-2 block">戻る</a>
                        </div>
                        <div class='paginate'>
                            {{ $tobuys->links() }}
                        </div>
            </div>
        </div>
    </div>
</div>
            <script>
                function deleteTobuy(id) {
                    'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか?')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
                </body>
</x-app-layout>
