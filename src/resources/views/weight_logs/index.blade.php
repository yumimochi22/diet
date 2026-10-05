@extends('layouts.app')

@section('title', '体重管理')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/index.css') }}?">
<link rel="stylesheet" href="{{ asset('css/weight_logs/create.css') }}">
@endsection

@section('content')

<div class="weight-log">

    <!--体重情報-->
    <section class="weight-summary">
        <div class="weight-summary__item">
            <p class="weight-summary__label">
                目標体重
            </p>

            <p class="weight-summary__value">
                {{ number_format($weightTarget, 1) }}
                <span>kg</span>
            </p>
        </div>

        <div class="weight-summary__item">
            <p class="weight-summary__label">
                目標まで
            </p>

            <p class="weight-summary__value">
                {{ number_format($weightDifference, 1) }}
                <span>kg</span>
            </p>
        </div>

        <div class="weight-summary__item">
            <p class="weight-summary__label">
                最新体重
            </p>

            <p class="weight-summary__value">
                {{ number_format($latestWeight, 1) }}
                <span>kg</span>
            </p>
        </div>
    </section>

    <!-- 体重データ -->
    <section class="weight-data">

        <!--検索。データ追加-->
        <div class="weight-data__top">
            <form action="{{ route('weight_logs.search') }}"
                  method="get"
                  class="search-form">

                <div class="search-form__dates">
                    <input type="date"
                           name="from"
                           value="{{ request('from') }}">
                           <span>~</span>
                           <input type="date"
                                  name="to"
                                  value="{{ request('to') }}">
                </div>

                <button type="submit" class="search-button">
                    検索
                </button>
            </form>

            <label for="weight-modal" class="add-button">
                データ追加
            </label>
        </div>

        <!--体重一覧-->
        <div class="weight-table">
            <table>
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th>運動時間</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($weightLogs as $weightLog)
                        <tr>
                            <!-- 日付 -->
                            <td>
                                {{ $weightLog->date->format('Y/m/d') }}
                            </td>

                            <!-- 体重 -->
                            <td>
                                {{ number_format($weightLog->weight, 1) }}kg
                            </td>

                            <!-- 食事摂取カロリー -->
                            <td>
                                {{ $weightLog->calories }}cal
                            </td>

                            <!-- 運動時間 -->
                            <td>
                                {{ \Carbon\Carbon::parse($weightLog->exercise_time)->format('H:i') }}
                            </td>

                            <!--鉛筆アイコン-->
                            <td>
                                <a href="{{ route('weight_logs.edit', $weightLog->id) }}"
                                    class="edit-icon">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

        <!--ページネーション-->
        <div class="pagination">
            {{ $weightLogs->links() }}
        </div>

    </section>
</div>

@include('weight_logs.create')

@endsection






        