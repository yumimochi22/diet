<input type="checkbox" id="weight-modal" class="modal-toggle">

    <div class="modal">
        <label for="weight-modal" class="modal__overlay"></label>
            
            <div class="modal__content">
                <label for="weight-modal" class="modal__close">
                    ×
                </label>

                <h2 class="modal__title">
                    Weight Logを追加
                </h2>

                <form action="{{ route('weight_logs.store') }}"
                    method="post"
                    class="weight-form">
                    @csrf

                    <!--日付-->
                    <div class="weight-form__group">
                        <label for="date">
                            日付
                            <span class="required">必須</span>
                        </label>

                        <input type="date"
                            name="date"
                            id="date"
                            value="{{ old('date', date('Y-m-d')) }}">

                        <div class="form-error">
                            @error('date')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <!--体重-->
                    <div class="weight-form__group">
                        <label for="weight">
                            体重
                        <span class="required">必須</span>
                        </label>

                        <div class="input-with-unit">
                            <input type="text"
                                name="weight"
                                id="weight"
                                value="{{ old('weight') }}"
                                placeholder="50.0">
                                <span>kg</span>
                        </div>

                        <div class="form-error">
                            @error('weight')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!--摂取カロリー-->
                    <div class="weight-form__group">
                        <label for="calories">
                            摂取カロリー
                            <span class="required">必須</span>
                        </label>

                        <div class="input-with-unit">
                            <input type="text"
                                name="calories"
                                id="calories"
                                value="{{ old('calories') }}"
                                placeholder="1200">
                                <span>cal</span>
                        </div>

                        <div class="form-error">
                            @error('calories')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!--運動時間-->
                    <div class="weight-form__group">
                        <label for="exercise_item">
                            運動時間
                            <span class="required">必須</span>
                        </label>

                        <input type="time"
                            name="exercise_time"
                            id="exercise_time"
                            value="{{ old('exercise_time') }}">
                            
                        <div class="form-error">
                            @error('exercise_item')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!--運動内容-->
                    <div class="weight-form__group">
                        <label for="exercise_content">
                            運動内容
                        </label>

                        <textarea id="exercise_content"
                                name="exercise_content"
                                placeholder="運動内容を記載">{{ old('exercise_content') }}</textarea>

                        <div class="form-error">
                            @error('exercise_content')
                            {{ $message }}
                            @enderror
                        </div>      
                    </div>

                    <div class="weight-form__buttons">

                        <a href="{{ route('weight_logs.index') }}"
                            class="back-button">
                            戻る
                        </a>

                        <button type="submit"
                            class="submit-button">
                            登録
                        </button>
                    </div>
                </form>
            </div>
    </div>



