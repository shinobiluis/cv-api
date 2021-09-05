<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillsResource extends JsonResource
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
            "abilities" => $this->abilities,
            "abilities_level" => $this->abilities_level,
            "user_id" => $this->user_id,
            "order_abilities" => $this->order_abilities,
            "created_at" => $this->created_at->format('y-m-d H:m a'),
            "updated_at" => $this->updated_at->format('y-m-d H:m a')
        ];
    }
}
