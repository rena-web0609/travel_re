<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlan extends FormRequest
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
            'title' => 'required',
            'image' => 'required',
            'season' => 'required',
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'プラン名',
            'season' => '季節',
            'image' => '画像',
            'content' => '詳細',
        ];
    }
}
