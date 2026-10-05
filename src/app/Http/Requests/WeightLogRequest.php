<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightLogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => [
                'required',
            ],
            'weight' => [
                'required',
                'numeric',
                'max:999.9',
                'regex:/^\d+(\.\d)?$/',
            ],
            'calories' => [
                'required',
                'numeric',
            ],
            'exercise_time' => [
                'required',
                'date_format:H:i',
            ],
            'exercise_content' => [
                'nullable',
                'string',
                'max:120',
            ],
        ];
    }

    public function messages()
    {
        return [
            'date.required' => '日付を入力してください',

            'weight.required' => '体重を入力してください',
            'weight.numeric' => '数字で入力してください',
            'weight.max' => '4桁までの数字で入力してください',
            'weight.decimal' => '少数点は1桁で入力してください',

            'calories.required' => '摂取カロリーを入力してください',
            'calories.numeric' => '数字で入力してください',
            
            'exercise_item.required' => '運動時間を入力してください',

            'exercise_content.max' => '120文字以内で入力してください',
        ];
    }
}
