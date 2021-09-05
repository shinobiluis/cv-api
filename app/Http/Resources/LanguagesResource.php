<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "language" => $this->language,
            "language_level" => $this->language_level,
            "order_languages" => $this->order_languages,
            "user_id" => $this->user_id,
            "created_at" => $this->created_at->format('y-m-d H:m a'),
            "updated_at" => $this->updated_at->format('y-m-d H:m a')
        ];
    }
}
