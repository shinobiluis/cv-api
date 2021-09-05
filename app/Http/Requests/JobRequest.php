<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'id' => 'nullable|integer',
            'company' => 'required',
            'market_stall' => 'required',
            'market_stall_city' => 'required',
            'market_stall_month' => 'required',
            'stall_market_year' => 'required',
            'stall_market_month_end' => 'required',
            'stall_market_year_end' => 'required',
            'job_description' => 'required',
            'order_jobs' => 'nullable|integer'
        ];
    }
    
    public function messages()
	{
		return [
            'id.integer' => 'El :attribute debe ser un numero',
            'address.required' => 'La :attribute es requerida',
            'company.required' => 'El :attribute es requerido',
            'market_stall.required' => 'La :attribute es requerido',
            'market_stall_city.required' => 'La :attribute es requerido',
            'market_stall_month.required' => 'El :attribute es requerido',
            'stall_market_year.required' => 'El :attribute es requerido',
            'stall_market_month_end.required' => 'El :attribute es requerido',
            'stall_market_year_end.required' => 'El :attribute es requerido',
            'job_description.required' => 'La :attribute es requerido',
            'order_jobs.integer' => 'El :attribute debe ser un numero'
		];
	}

	public function attributes()
    {
        return [
            'id' => 'ID',
            'company' => 'Empresa',
            'market_stall' => 'Puesto',
            'market_stall_city' => 'Ciudad/Pueblo',
            'market_stall_month' => 'Mes de inicio',
            'stall_market_year' => 'Año de inicio',
            'stall_market_month_end' => 'Mes de termino',
            'stall_market_year_end' => 'Año de termino',
            'job_description' => 'Descripcion del puesto',
            'order_jobs' => 'Orden'
        ];
    }
}
