<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StuffRequest extends FormRequest
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
            'name'              => 'required',
            'username'          => 'bail | required | unique:tbl_admin,username',
            'phone'             => 'bail | required | unique:tbl_admin,phone',
            'email'             => 'bail | required | unique:tbl_admin,email',
            'password'          => 'bail | required | min:6',
            'confirm_password'  => 'same:password'
        ];
    }
}
