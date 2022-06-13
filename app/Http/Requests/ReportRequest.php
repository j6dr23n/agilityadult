<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ReportRequest extends FormRequest
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
            'video_id' => 'int|required',
            'name' => 'string|required|max:255',
            'email' => 'email|required|max:255',
            'ph_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'info' => 'string|required|max:455',
        ];
    }
}
