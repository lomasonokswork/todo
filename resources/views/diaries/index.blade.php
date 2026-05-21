<x-layout>
  <x-slot:title>
    Sveiks, Laravel!
  </x-slot:title>
  <h1>Sveiks, Laravel!</h1>


    <ul>
        @foreach ($diaries as $diary)
            <li><a href="/diaries/{{ $diary->id }}">{{ $diary->title }}</a></li>
        @endforeach
    </ul>
</x-layout>