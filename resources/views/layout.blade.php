<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class="my-navbar">
        <a class="my-navbar-brand" href={{ route('plans.index') }}>Travel</a>
        <div class="my-navbar-control">
            @if(Auth::check())
                <a href={{ route('mypage') }} id=“mypage” class=“my-navbar-item”>マイページ</a>
                ｜
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action={{ route('logout') }} method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="my-navbar-item" href={{ route('login') }}>ログイン</a>
                ｜
                <a class="my-navbar-item" href={{ route('register') }}>会員登録</a>
            @endif
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>
@if(Auth::check())
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
@endif
@yield('scripts')
</body>
</html>
