<x-layout>
    <x-slot:title>
        {{ $todo->content }}
    </x-slot:title>
    <h1>{{ $todo->content }}</h1>
    <p>Izpildits: {{ $todo->completed ? "Ja" : "Ne" }}</p>
    <p><a href="/todos/{{ $todo->id }}/edit">Rediģēt</a></p>
    <p><a href="/todos">Atpakal uz sarakstu</a></p>
    <form method="POST" action="/todos/{{ $todo->id }}/delete">
        @csrf
        @method('DELETE')
        <button>Dzēst</button>
    </form>
</x-layout>