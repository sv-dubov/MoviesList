<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreSaveRequest extends FormRequest
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
            'name' => 'required|min:2|max:50|unique:genres'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Name must have minimum 2 characters',
            'name.max' => 'Name must have maximum 50 characters'
        ];
    }
}
