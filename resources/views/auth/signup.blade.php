<x-layout>
    <x-slot:title>Signup</x-slot:title>
    <h1>Izveidot Kontu</h1>

    <form method="POST" action="/register">
        @csrf

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div>
            <label for="first_name">First Name</label><br>
            <input type="text" id="first_name" name="first_name" required><br><br>
        </div>

        <div>
            <label for="last_name">Last Name</label><br>
            <input type="text" id="last_name" name="last_name" required><br><br>
        </div>

        <div>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" required><br><br>
        </div>

        <div>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" required><br><br>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>
        </div>

        <button type="submit">Register</button>
    </form>
    
</x-layout>