<?php

namespace App\Http\Requests\Dashboard\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'firstname'                 => 'required|string|min:3|max:35',
            'middlename'                => 'required|string|min:3|max:35',
            'lastname'                  => 'required|string|min:3|max:35',
            'name'                      => 'required|string|min:3|max:35|unique:students',
            'phone'                     => 'required|min:11|numeric|unique:students',
            'photo'                     =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender'                    => 'required',
            'email' => 'required|email|unique:students,email,'.$this->route('student')->id,
        ];
    }
}
