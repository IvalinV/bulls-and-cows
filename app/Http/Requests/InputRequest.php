<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InputRequest extends FormRequest
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
            'input' => 'sometimes|max:9',
            'digit' => 'sometimes|max:9',
            'position' => 'sometimes|numeric',
            'array' => 'sometimes',
            'input_array.*.value' => 'numeric|min:1|max:9',
            'input_array.*.position' => 'numeric',
            'generated_array.*' => 'numeric|min:1|max:9',
            'bulls_found' => 'sometimes',
            'cows_found' => 'sometimes',
            'full_numbers_found' => 'sometimes'
        ];
    }

    public function messages()
    {
        return [
            'input_array.*.value.min' => 'The input should be greater than 0.',
            'input_array.*.value.max' => 'The input may not be greater than 9.',
            'generated_array.*.value.min' => 'The input should be greater than 0.',
            'generated_array.*.value.max' => 'The input may not be greater than 9.',
        ];
    }
}
