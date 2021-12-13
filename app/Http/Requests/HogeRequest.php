<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HogeRequest extends FormRequest
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
            'kana' => 'required|string|regex:/^[ァ-ヾ　〜ー]+$/u',
            'english' => 'required|string|regex:/^[!-~ ¥]+$/u',
        ];
    }
    public function prepareForValidation()
    {
        $this->merge(['english' => mb_convert_kana($this->english, 'as')]);
    }
}
