<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">

        @yield('css')
    </head>

    <body>
        <div class="auth">
            <div class="auth__container">
                <h1 class="auth__logo">
                    PiGLy
                </h1>

                @yield('content')

            </div>
        </div>
    </body>

</html>