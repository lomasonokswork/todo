<header>
<nav>
    <ul>
        @auth
            <li><a href="/">Sākums</a></li>
            <li><a href="/todos">Visi uzdevumi</a></li>
            <li><a href="/why">Kāpēc</a></li>
            <li><a href="/diaries">Diaries</a></li>
            <li><a href="/todos/create">Create ToDo</a></li>
            <li><a href="/diaries/create">Create Diary</a></li>
            <li>
                <form method="POST" action="/logout">
                    @csrf
                    <button>Logout</button>
                </form>
            </li>
        @endauth

        @guest
            <li><a href="/">Sākums</a></li>
            <li><a href="/register">Izveidot Kontu</a></li>
            <li><a href="/login">Pierakstīties</a></li>
        @endguest
    </ul>
</nav>
</header>
