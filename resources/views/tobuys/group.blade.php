<!--グループごとのToBuy-->
<x-app-layout>
    <x-slot name="header">
        to buy一覧
    </x-slot>
    <body>
        <div class='tobuys'>
            @foreach ($tobuys as $tobuy)
            <div class='tobuy'>
                <h2 class='tobuy'>
                <a href="/tobuys/{{ $tobuy->id }}">{{ $tobuy->tobuy }}</a>
                </h2>
                <a href="/groups/{{ $tobuy->group->id }}">{{ $tobuy->group->name }}</a>
                <p class='deadline'>{{ $tobuy->deadline }}</p>
                <form action="/tobuys/{{ $tobuy->id }}" id="form_{{ $tobuy->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteTobuy({{ $tobuy->id }})">削除</button>
                </form>
            @endforeach
            <div class="footer">
            <a href="/index">戻る</a>
           </div>
            <div class='paginate'>
                {{ $tobuys->links() }}
            </div>
            <script>
                function deleteTobuy(id) {
                    'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか?')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            </div>
        </div>
    </body>
</x-app-layout>
