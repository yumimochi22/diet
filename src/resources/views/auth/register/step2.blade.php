@extends('layouts.auth')

@section('title', '新規会員登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}?v={{ time() }}">
@endsection

@section('content')

    <h2 class="register__title">
        新規会員登録
    </h2>

    <p class="register__step">
        STEP2 体重データ入力
    </p>

    <form action="{{ route('register.step2.store') }}" method="post">
        @csrf

        {{-- 現在の体重 --}}
        <div class="form-group">
            <label for="current_weight">
                現在の体重
            </label>

            <div class="weight-input">
                <input type="text"
                       name="current_weight"
                       id="current_weight"
                       value="{{ old('current_weight') }}"
                       placeholder="現在の体重を入力">

                <span>kg</span>
            </div>

            <div class="form-error">
                @error('current_weight')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- 目標の体重 --}}
        <div class="form-group">
            <label for="target_weight">
                目標の体重
            </label>

            <div class="weight-input">
                <input type="text"
                       name="target_weight"
                       id="target_weight"
                       value="{{ old('target_weight') }}"
                       placeholder="目標の体重を入力">

                <span>kg</span>
            </div>

            <div class="form-error">
                @error('target_weight')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <button type="submit" class="register__button">
            アカウント作成
        </button>

    </form>

@endsection