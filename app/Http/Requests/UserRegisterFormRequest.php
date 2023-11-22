<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required'],
            'password' => ['min:6', 'required_with:password_confirmation', 'same:password_confirmation'],
            'password_confirmation' => ['min:6']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome precisa de pelo menos :min caracteres',
            'password.min' => 'A senha deve ter no mínimo :min caracteres',
            'password.same' => 'Os valores do campo de senha e confimação devem ser iguais',
        ];
    }
}
