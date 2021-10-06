<?php

namespace App\Http\Requests\Dashboard\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'semester'                  => 'required',
            'grade'                     => 'required',
            'class_room'                => 'required',
            'firstname'                 => 'required|string|min:3|max:35',
            'middlename'                => 'required|string|min:3|max:35',
            'lastname'                  => 'required|string|min:3|max:35',
            'name'                      => 'required|string|min:3|max:35|unique:students',
            'email'                     =>'required|email|unique:students',
            'password'                  =>'required|confirmed|min:8|max:20',
            'phone'                     => 'required|min:11|numeric|unique:students',
            'photo'                     =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gender'                    => 'required',
        ];
    }
}
