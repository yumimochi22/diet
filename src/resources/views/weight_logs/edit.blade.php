@extends('layouts.app')

@section('title', '体重更新')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/edit.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="edit">
    <div class="edit__container">

        <h1 class="edit__title">
            Weight Log
        </h1>

        <form action="{{ route('weight_logs.update', $weightLog->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <div class="form-group">
                <label for="date">
                    日付
                </label>

                <input
                    type="date"
                    name="date"
                    id="date"
                    value="{{ old('date', $weightLog->date->format('Y-m-d')) }}"
                >

                @error('date')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


    
            <div class="form-group">
                <label for="weight">
                    体重
                </label>

                <div class="input-with-unit">
                    <input
                        type="text"
                        name="weight"
                        id="weight"
                        value="{{ old('weight', $weightLog->weight) }}"
                    >

                    <span>kg</span>
                </div>

                @error('weight')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            
            <div class="form-group">
                <label for="calories">
                    摂取カロリー
                </label>

                <div class="input-with-unit">
                    <input
                        type="text"
                        name="calories"
                        id="calories"
                        value="{{ old('calories', $weightLog->calories) }}"
                    >

                    <span>cal</span>
                </div>

                @error('calories')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            
            <div class="form-group">
                <label for="exercise_time">
                    運動時間
                </label>

                <input
                    type="time"
                    name="exercise_time"
                    id="exercise_time"
                    value="{{ old('exercise_time', $weightLog->exercise_time ? \Carbon\Carbon::parse($weightLog->exercise_time)->format('H:i') : '') }}"
                >

                @error('exercise_time')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            
            <div class="form-group">
                <label for="exercise_content">
                    運動内容
                </label>

                <textarea
                    name="exercise_content"
                    id="exercise_content"
                    placeholder="運動内容を追加"
                >{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>

                @error('exercise_content')
                    <div class="form-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>


        
            <div class="edit__buttons">

                <a href="{{ route('weight_logs.index') }}"
                   class="edit__back">
                    戻る
                </a>

                <button type="submit"
                        class="edit__button">
                    更新
                </button>

            </div>

        </form>


        <form action="{{ route('weight_logs.destroy', $weightLog->id) }}"
              method="POST"
              class="delete-form">

            @csrf
            @method('DELETE')

            <button type="submit" class="delete-button">
                <i class="fa-solid fa-trash"></i>
            </button>

        </form>

    </div>
</div>

@endsection