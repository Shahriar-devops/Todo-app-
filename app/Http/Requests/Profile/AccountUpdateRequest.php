<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AccountUpdateRequest extends FormRequest
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
            'email'            => 'required|string|max:255|unique:users,email,'.Auth::user()->id,
            'designations'     =>  ['required','string'],
            'date_of_birth'    =>  ['required'],
            'gender'           =>  ['required'],
        ];
    }
}
