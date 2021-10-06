<?php

namespace App\Http\Requests\Dashboard\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question_time'         => 'required|',
            'question_type'         => 'required|',
            'question_mark'         => 'required|',
            'question'              => 'required|',
            'answer'                => 'required|',
            'audio'                 => 'required|',
        ];
    }
}
