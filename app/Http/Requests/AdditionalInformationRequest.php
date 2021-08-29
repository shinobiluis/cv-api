<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalInformationRequest extends FormRequest
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
            'address' => 'required|string',
            'postal_code' => 'required',
            'city_town' => 'required',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'driving_license' => 'required',
            'gender' => 'required',
            'linkedin' => 'required',
            'web_page' => 'required'
        ];
    }
	
	public function messages()
	{
		return [
            'address.required' => 'La :attribute es requerido',
            'postal_code.required' => 'El :attribute es requerido',
            'city_town.required' => 'El :attribute es requerido',
            'date_of_birth.required' => 'La :attribute es requerido',
            'place_of_birth.required' => 'La :attribute es requerido',
            'driving_license.required' => 'La :attribute es requerido',
            'gender.required' => 'El :attribute es requerido',
            'linkedin.required' => 'El :attribute es requerido',
            'web_page.required' => 'La :attribute es requerida'
		];
	}

	public function attributes()
    {
        return [
            'address' => 'Direccion',
            'postal_code' => 'Codigo postal',
            'city_town' => 'Ciudad/Pueblo',
            'date_of_birth' => ' Fecha de nacimiento',
            'place_of_birth' => ' Lugar de nacimiento',
            'driving_license' => ' Permiso de conducir',
            'gender' => 'Genero',
            'linkedin' => 'LinkedIn',
            'web_page' => 'Página web'
        ];
    }
}
