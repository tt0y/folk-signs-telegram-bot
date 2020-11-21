<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperstitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            $rules = [
                'day' => 'required|min:1|max:31',
                'month' => 'required|min:1|max:12',
            ]
        ];
    }
}
