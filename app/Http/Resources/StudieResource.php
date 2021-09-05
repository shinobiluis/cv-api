<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "institution" => $this->institution,
            "institution_name" => $this->institution_name,
            "institution_name_city" => $this->institution_name_city,
            "study_date_start_month" => $this->study_date_start_month,
            "study_date_start_year" => $this->study_date_start_year,
            "study_date_end_month" => $this->study_date_end_month,
            "study_date_end_year" => $this->study_date_end_year,
            "study_description" => $this->study_description,
            "order_studiesandcertifications" => $this->order_studiesandcertifications,
            "created_at" => $this->created_at->format('Y-m-d'),
            "updated_at" => $this->updated_at->format('Y-m-d')
        ];
    }

    public function with( $request ){
        return [
            'res' => true
        ];
    }
}
