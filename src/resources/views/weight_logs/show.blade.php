@extends('layouts.app')

@section('title', '体重詳細')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/show.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="show">

    <div class="show__container">

        <h1 class="show__title">
            Weight Log
        </h1>

    
        <div class="detail-group">

            <div class="detail-label">
                日付
            </div>

            <div class="detail-value">
                {{ $weightLog->date->format('Y/m/d') }}
            </div>

        </div>

        
        <div class="detail-group">

            <div class="detail-label">
                体重
            </div>

            <div class="detail-value">
                {{ $weightLog->weight }} kg
            </div>

        </div>

        
        <div class="detail-group">

            <div class="detail-label">
                摂取カロリー
            </div>

            <div class="detail-value">
                {{ $weightLog->calories ?? '-' }} cal
            </div>

        </div>

        
        <div class="detail-group">

            <div class="detail-label">
                運動時間
            </div>

            <div class="detail-value">
                @if($weightLog->exercise_time)
                    {{ \Carbon\Carbon::parse($weightLog->exercise_time)->format('H:i') }}
                @else
                    -
                @endif
            </div>

        </div>

    
        <div class="detail-group">

            <div class="detail-label">
                運動内容
            </div>

            <div class="detail-value detail-value--textarea">
                {{ $weightLog->exercise_content ?: '-' }}
            </div>

        </div>

        
        <div class="show__buttons">

            <a
                href="{{ route('weight_logs.index') }}"
                class="show__back"
            >
                戻る
            </a>

        </div>

    </div>

</div>

@endsection