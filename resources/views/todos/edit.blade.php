<x-layout>
    <x-slot:title>
        Rediģēt uzdevumu
    </x-slot:title>
    <h1>Rediģēt uzdevumu</h1>

    <form method="POST" action="/todos/{{ $todo->id }}">
        @csrf
        @method('PUT')

        <label>
            Uzdevums:
            <input name="content" type="text" value={{ old("content", $todo->content) ? $todo->content : '' }}>
        </label>

        @error("content")
            <p>{{ $message }}</p>
        @enderror

        <label>
            Izpildīts:
            <input name="completed" type="hidden" value="0">
            <input name="completed" type="checkbox" value="1" {{ old("completed", $todo->completed) ? 'checked' : '' }}>
        </label>

        @error("completed")
            <p>{{ $message }}</p>
        @enderror

        <button>Saglabāt</button>
    </form>

</x-layout>