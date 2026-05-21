<x-layout>
    <x-slot:title>Signup</x-slot:title>
    <h1>Pierakstīties</h1>

    <form action="/login" method="POST">
        @csrf

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br><br>
        </div>

        <div>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br><br>
        </div>

        <button>Login</button>
    </form>

</x-layout>