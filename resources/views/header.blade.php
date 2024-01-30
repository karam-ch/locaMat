<header>
    <h1>Locamat</h1>

    @if(Auth::check())
        <div>
            {{ Auth::user()->lastname }}
        </div>
    @else
        <div>Not connected</div>
    @endif
</header>
