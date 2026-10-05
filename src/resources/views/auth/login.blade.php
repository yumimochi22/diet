@extends('layouts.auth')

@section('title', 'ログイン')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')

    <h2 class="login__title">
        ログイン
    </h2>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">
                メールアドレス
            </label>

            <input type="text"
                   name="email"
                   id="email"
                   placeholder="メールアドレスを入力"
                   value="{{ old('email') }}">

            <div class="form-error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="password">
                パスワード
            </label>

            <input type="password"
                   name="password"
                   id="password"
                   placeholder="パスワードを入力">

            <div class="form-error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>

        <button
            type="submit"
            class="login__button">
            ログイン
        </button>

    </form>

    <a href="{{ route('register.step1') }}"
       class="login__link">
        アカウント作成はこちら
    </a>

    @endsection
