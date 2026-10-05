@extends('layouts.app')

@section('title', '目標体重設定')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/goal_setting.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="goal-setting">
    <div class="goal-setting__container">

        <h1 class="goal-setting__title">
            目標体重設定
        </h1>

        <form action="{{ route('weight_logs.update_goal') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">

                <div class="goal-weight-input">

                    <input
                        type="text"
                        name="target_weight"
                        id="target_weight"
                        value="{{ old('target_weight', $targetWeight) }}"
                    >

                    <span>kg</span>

                </div>

                @error('target_weight')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="goal-setting__buttons">

                <a
                    href="{{ route('weight_logs.index') }}"
                    class="goal-setting__back"
                >
                    戻る
                </a>

                <button
                    type="submit"
                    class="goal-setting__button"
                >
                    更新
                </button>

            </div>

        </form>

    </div>
</div>

@endsection