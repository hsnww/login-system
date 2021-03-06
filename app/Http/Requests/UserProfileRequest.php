<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
           'name'=>'required|between:3,32',
           'email'=>'required|email|unique:users,email,'. Auth()->user()->id,
           'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ];
    }
}
