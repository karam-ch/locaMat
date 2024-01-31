<head>
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
</head>
<header>
    <a href="/">
        <img src="{{ asset('images/Locamat2.png') }}" alt="" class='logo-image'>
    </a>

    @if(Auth::check())
        <div class="header-container">
            {{ Auth::user()->lastname }}
        </div>
    @else
        <div class="header-container">Not connected</div>
    @endif
</header>
