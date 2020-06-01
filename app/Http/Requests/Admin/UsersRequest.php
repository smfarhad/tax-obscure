<?php

namespace App\Http\Requests\admin;

use App\Http\Requests\Request;

class UsersRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'email' => 'required|unique:users',
            'office' => 'required',
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ];
    }

}
