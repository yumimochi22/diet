@extends('layouts.auth')

@section('title', '新規会員登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')

    <h2 class="register__title">
        新規会員登録
    </h2>
    <p class="register__step">
        STEP1 アカウント情報の登録
    </p>

    <form action="{{ route('register.step1.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">
                お名前
            </label>

            <input type="text"
                   name="name"
                   id="name"
                   placeholder="お名前を入力"
                   value="{{ old('name') }}">
            
            <div class="form-error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="email">
                メールアドレス
            </label>

            <input type="email"
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
            class="register__button"
        >
            次に進む
        </button>

    </form>

    <a href="/login" class="login-link">ログインはこちら</a>

@endsection