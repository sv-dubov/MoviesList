<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieSaveRequest extends FormRequest
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
            'title' => 'required|min:2|max:100',
            'genres' => 'required',
            'genres.*' => 'exists:genres,id',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Title',
            'genres' => 'Genres',
            'poster' => 'Poster'
        ];
    }

    public function messages()
    {
        return [
            'title.min' => 'Title must have minimum 2 characters',
            'title.max' => 'Title must have maximum 100 characters',
            'genres.required' => 'Choose at least one genre',
            'poster.max' => 'Poster size must be maximum 2MB'
        ];
    }
}
