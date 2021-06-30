<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ];
    }

	public function messages()
	{
		return [
			// requeridos
			'name.required' => 'El :attribute requerido',
			'email.required' => 'El :attribute requerido',
			'password.required' => 'La :attribute requerido',
			// unicos
			'email.unique' => 'El :attribute ya esta registrado',

		];
	}

	public function attributes()
    {
        return [
            'name' => 'Nombre',
            'email' => 'Correo',
            'password' => 'Contraseña',
        ];
    }
}
