<!doctype html>
<html lang='en'>
<head>
    <title>Greg's Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href='/css/wine.css' rel='stylesheet'>
    @yield('head')
    <header>
        <div>
            <img src='/image/WineListLogo.png' id='logo' alt='Wine List Logo'>
            <nav>
                <ul>
                    @foreach(config('app.nav') as $link => $label)
                        <li>
                            {{-- If the current path is the same as this link, display as plain text, not a hyperlink--}}
                            @if(Request::is($link))
                                {{ $label }}
                                {{-- Otherwise, display as a hyerlink --}}
                            @else
                                <a href='/{{ $link }}'>{{ $label }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </header>
</head>
<body>
<section>
    @yield('content')
</section>

</body>
</html>