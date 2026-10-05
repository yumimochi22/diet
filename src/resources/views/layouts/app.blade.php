<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'PiGLy')</title>

<link rel="stylesheet" href="{{ asset('css/common.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

@yield('css')
</head>

<body>
    <header class="header">
        <!-- ロゴ -->
        <a href="{{ route('weight_logs.index') }}"
            class="header__logo">
            PiGLy
        </a>

        <div class="header__buttons">
            <!-- PG07 目標設定 -->
            <a href="{{ route('weight_logs.goal_setting') }}"
                class="header__button">
                <i class="fa-solid fa-gear"></i>
                目標体重
            </a>

            <!-- PG11ログアウト -->
            <form action="{{ route('logout') }}" method="post">
                @csrf

                <button type="submit" class="header__button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    ログアウト
                </button>
            </form>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>
