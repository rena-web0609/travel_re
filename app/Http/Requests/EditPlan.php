<?php

namespace App\Http\Requests;

use App\Plan;
use Illuminate\Foundation\Http\FormRequest;

class EditPlan extends FormRequest
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
        $rule = parent::rules();

        return $rule;
    }

    public function messages()
    {
        $messages = parent::messages();

        return $messages;
    }
}
