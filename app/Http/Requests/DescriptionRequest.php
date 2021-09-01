<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DescriptionRequest extends FormRequest
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
            'description' => 'required'
        ];
    }
    
    public function messages()
	{
		return [
            'description.required' => 'La :attribute es requerida'
		];
	}

	public function attributes()
    {
        return [
            'description' => 'Descripcion'
        ];
    }
}
