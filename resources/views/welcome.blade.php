<x-layout>
  <x-slot:title>
    Blog
  </x-slot:title>
  @auth
    <h1>Sveiks, {{ Auth::user()->name}}</h1>
    <p>Šajā mājaslapā vari pierakstīt dienas veicamos uzdevumus, kā arī notikumus. Tā apvieno fizisko dienasgrāmatu un
      to-do sarakstu vienā parocīgā, ērtā mājaslapā!</p>
  @endauth
  @guest
    <h1>Sveiks, viesi!</h1>
    <p>Šajā mājaslapā vari pierakstīt dienas veicamos uzdevumus, kā arī notikumus. Tā apvieno fizisko dienasgrāmatu un
      to-do sarakstu vienā parocīgā, ērtā mājaslapā!</p>
  @endguest
</x-layout>