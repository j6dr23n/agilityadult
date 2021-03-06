<?php

namespace App\Http\Requests\Manga;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'string|required|max:255',
            'genres' => 'string|required|min:3',
            'tags' => 'string|required|min:3',
            'info' => 'string|required',
            'poster' => 'image',
            'type' => 'string|required',
            'status' => 'required',
        ];
    }
}
