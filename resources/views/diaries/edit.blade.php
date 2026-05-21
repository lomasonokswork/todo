<x-layout>
    <x-slot:title>
        Rediģēt ierakstu
    </x-slot:title>
    <h1>Rediģēt ierakstu</h1>

    <form method="POST" action="/diaries/{{ $diary->id }}">
        @csrf
        @method('PUT')

        <label>
            Nosaukums:
            <input name="title" type="text" value={{ old("title", $diary->title) ? $diary->title : '' }}>
        </label>

        @error("title")
            <p>{{ $message }}</p>
        @enderror

        <label>
            Ieraksts:
            <input name="body" type="text" value={{ old("body", $diary->body) ? $diary->body : '' }}>
        </label>

        @error("body")
            <p>{{ $message }}</p>
        @enderror

        <label>
            Datums:
            <input name="date" type="date" value={{ old("date", $diary->date) ? $diary->date : '' }}>
        </label>

        @error("date")
            <p>{{ $message }}</p>
        @enderror

        <button>Saglabāt</button>
    </form>

</x-layout>