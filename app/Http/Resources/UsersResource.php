<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            "name" => $this->id,
            "email" => $this->id,
            "created_at" => $this->created_at->format('y-m-d H:m a'),
            "updated_at" => $this->updated_at->format('y-m-d H:m a')
        ];
    }
}
