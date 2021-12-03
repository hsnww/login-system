<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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
            'email'=>'required|email|max:255|exists:users',
            'subject'=>'required|between:6,160',
            'body'=>'required'
        ];
    }

    public function messages()
    {
        return
        [
            'email.required'=>'Email field is required',
            'email.email'=>'Email field should be in correct format',
            'email.exists'=>'Email should be in our database, the entered email look like not one of our members',
            'subject.required'=>'Subject field is required',
            'subject.between'=>'Subject length must between 6 and 160 characters ',
            'body.required'=>'Message body field is required',
        ];

    }
}
