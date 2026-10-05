@extends('layouts.app')

@section('title', '体重検索')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs/search.css') }}?v={{ time() }}">
@endsection

@section('content')

<div class="search">

    <div class="search__container">

        <h1 class="search__title">
            体重検索
        </h1>

        
        <form action="{{ route('weight_logs.search') }}"
              method="GET"
              class="search-form">

            <div class="form-group">

                <label>
                    日付
                </label>

                <div class="date-range">

                    
                    <input
                        type="date"
                        name="start_date"
                        value="{{ request('start_date') }}"
                    >

                    <span>〜</span>

                    
                    <input
                        type="date"
                        name="end_date"
                        value="{{ request('end_date') }}"
                    >

                </div>

            </div>

            <div class="search-form__buttons">

                <button type="submit" class="search-button">
                    検索
                </button>

                
                @if(request('start_date') || request('end_date'))
                    <a
                        href="{{ route('weight_logs.search') }}"
                        class="reset-button"
                    >
                        リセット
                    </a>
                @endif

            </div>

        </form>


        
        @if(request('start_date') || request('end_date'))

            <div class="search-result">

                <h2 class="search-result__title">
                    {{ request('start_date') ?? '指定なし' }}
                    〜
                    {{ request('end_date') ?? '指定なし' }}
                    の検索結果
                    {{ $weightLogs->total() }}件
                </h2>


                @if($weightLogs->count())

                    <div class="weight-list">

                        @foreach($weightLogs as $weightLog)

                            <div class="weight-item">

                                <div class="weight-item__date">
                                    {{ $weightLog->date->format('Y/m/d') }}
                                </div>

                                <div class="weight-item__weight">
                                    {{ $weightLog->weight }} kg
                                </div>

                                <div class="weight-item__calories">
                                    {{ $weightLog->calories ?? '-' }} cal
                                </div>

                                <a
                                    href="{{ route('weight_logs.show', $weightLog->id) }}"
                                    class="weight-item__link"
                                >
                                    詳細
                                </a>

                            </div>

                        @endforeach

                    </div>

                    <div class="pagination">
                        {{ $weightLogs->links() }}
                    </div>

                @else

                    <p class="no-result">
                        該当する体重データがありません。
                    </p>

                @endif

            </div>

        @endif

    </div>

</div>

@endsection