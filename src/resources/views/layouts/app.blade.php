<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                <a href="/" class="header__logo">Atte</a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a href="/" class="header-nav__link">ホーム</a>
                            <a href="/" class="header-nav__link">日付一覧</a>
                            <a href="/" class="header-nav__link">ログアウト</a>
                        </li>
                    </ul>
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