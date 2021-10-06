<?php

namespace App\Http\Requests\Dashboard\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'firstname'                 => 'required|string|min:3|max:35',
            'lastname'                  => 'required|string|min:3|max:35',
            'name'                      => 'required|string|min:3|max:35|unique:users,id',
            'email'                     =>'required|email|unique:users',
            'password'                  =>'required|confirmed|min:5|max:20',
            'phone'                     => 'required|min:10|numeric|unique:users',
            'photo'                     =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'roles'                     => 'required',
            'gender'                    => 'required',
            'cv'                        => 'mimetypes:application/pdf|max:20000',
            'birthdate'                 => 'required',
        ];
    }

}
