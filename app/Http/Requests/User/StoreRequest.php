<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreRequest extends FormRequest
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
            'name'          => ['required','min:4'],
            'email'         => ['required','string','unique:users'],
            'date_of_birth' => ['required'],
            'gender'        => ['required','numeric'],
            'phone'         => ['required','numeric'],
            'role'          => ['required','numeric'],
            'password'      => ['required','string','min:8'],
        ];

    }

    public function messages()
    {
        return [
            'gender.required'  => 'Please select a gender.'
        ];
    }
}
