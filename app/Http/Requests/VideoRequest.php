<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title' => 'string|required',
            'tags' => 'string|required',
            'poster' => 'required',
            'embed_link' => 'url|nullable',
            'drive_id' => 'numeric|nullable',
            'link' => 'url|nullable'
        ];
    }
}
