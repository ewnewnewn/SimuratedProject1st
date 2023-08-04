<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                <a href="/" class="header__logo">Atte</a>
            </div>
            <div class="header__content">
                <nav>
                    @if(Auth::check())
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="header-nav__form" method="GET" action="/">
                                @csrf
                                <button>ホーム</button>
                            </form>
                            <form class="header-nav__form" method="GET" action="/attendance">
                                @csrf
                                <button>日付一覧</button>
                            </form>
                            <form class="header-nav__form" method="GET" action="/users">
                                @csrf
                                <button>ユーザー一覧</button>
                            </form>
                            <form class="header-nav__form" method="POST" action="/logout">
                                @csrf
                                <button>ログアウト</button>
                            </form>
                        </li>
                    </ul>
                    @endif
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    
    <footer class="footer">
        <div class="footer__inner">
            <div class="footer__content">
                <p class="footer__item">Atte,inc.</p>
            </div>
        </div>
    </footer>
</body>

</html>