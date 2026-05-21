<x-layout>
  <x-slot:title>
    Visi veicamie uzdevumi
  </x-slot:title>
  <h1>Visi veicamie uzdevumi</h1>
  
  <ul>
        @foreach ($todos as $todo)
            <li><a href="/todos/{{ $todo->id }}">{{ $todo->content }}</a></li>
        @endforeach
    </ul>
</x-layout>
    
    
