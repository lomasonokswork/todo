<x-layout>
<x-slot:title>Izveidot diary</x-slot:title>
<h1>Izveidot diary</h1>
<form method="POST" action="/diaries">
@csrf
  <input name="title" type="text" required/><br>
  <input name="body" type="text" required/><br>
  <input name="date" type="date" required/><br>
    @error("title")
    <p>{{ $message }}</p>
    @enderror
  <button>Saglabāt</button>
</form>
</x-layout>