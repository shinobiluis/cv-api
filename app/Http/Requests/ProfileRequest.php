<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'names' => 'required|string',
            'surnames' => 'required|string',
			'phone' => 'required|string|min:10',
			'job_title' => 'required|string'
        ];
    }
	
	public function messages()
	{
		return [
			// required
			'names.required' => 'El :attribute es requerido',
			'surnames.required' => 'El :attribute es requerido',
			'phone.required' => 'El :attribute es requerido',
			'job_title.required' => 'El :attribute es requerido',
            // string min
            'phone.min' => 'El :attribute debe tener al menos 10 caracteres'
		];
	}

	public function attributes()
    {
        return [
            'names' => 'Nombre',
            'surnames' => 'Apellidos',
			'phone' => 'Telefono',
			'job_title' => 'Titulo profecional'
        ];
    }
}
