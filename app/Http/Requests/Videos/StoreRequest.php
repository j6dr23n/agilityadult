<?php

namespace App\Http\Requests\Videos;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'string|required|max:255|unique:videos',
            'tags' => 'string|required|min:10',
            'poster' => 'array|nullable',
            'embed_link' => 'url|nullable',
            'link' => 'url|nullable',
            'status' => 'required'
        ];
    }
}
