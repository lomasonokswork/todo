<x-layout>
    <x-slot:title>
        {{ $diary->title }}
    </x-slot:title>
    <h1>{{ $diary->title }}</h1>
    <p><?=$diary->body?></p>
    <p><?=$diary->date?></p>
    <p><a href="/diaries/{{ $diary->id }}/edit">Rediģēt</a></p>
    <p><a href="/diaries">Atpakal uz sarakstu</a></p>
    <form method="POST" action="/diaries/{{ $diary->id }}/delete">
        @csrf
        @method('DELETE')
        <button>Dzēst</button>
    </form>
</x-layout>