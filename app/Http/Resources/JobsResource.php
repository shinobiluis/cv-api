<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'company' => $this->company,
            'market_stall' => $this->market_stall,
            'market_stall_city' => $this->market_stall_city,
            'market_stall_month' => $this->market_stall_month,
            'stall_market_year' => $this->stall_market_year,
            'stall_market_month_end' => $this->stall_market_month_end,
            'stall_market_year_end' => $this->stall_market_year_end,
            'job_description' => $this->job_description,
            'order_jobs' => $this->order_jobs,
            'links' => [
                'self' => route('job.consutl', $this->id),
            ],
        ];
    }

    public function with( $request ){
        return [
            'res' => true
        ];
    }
        
}
