<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudieRequest extends FormRequest
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
            'institution' => "required",
            'institution_name' => "required",
            'institution_name_city' => "required",
            'study_date_start_month' => "required",
            'study_date_start_year' => "required",
            'study_date_end_month' => "required",
            'study_date_end_year' => "required",
            'study_description' => "required"
        ];
    }
}
