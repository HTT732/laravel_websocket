<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6|'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được để trôống',
            'email' => 'Trường :attribute định dạng không đúng'
        ];
    }
}
