<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "subscriber_type"=>$this->subscriber_type,
            "subscriber_id"=> $this->subscriber_id,
            "plan_id"=> $this->plan_id,
            "slug"=> $this->slug,
            "name"=> $this->name,
            "description"=> $this->description,
            "trial_ends_at"=> $this->trial_ends_at?->format('Y-m-d') ?? null,
            "starts_at"=>$this->starts_at?->format('Y-m-d') ?? null,
            "ends_at"=>$this->ends_at?->format('Y-m-d') ?? null,
            "cancels_at"=> $this->cancels_at?->format('Y-m-d') ?? null,
            "canceled_at"=> $this->canceled_at?->format('Y-m-d') ?? null,
            "timezone"=> $this->timezone,
            "created_at"=> $this->created_at?->format('Y-m-d') ?? null,
            "updated_at"=> $this->updated_at?->format('Y-m-d') ?? null,
            "deleted_at"=> $this->deleted_at?->format('Y-m-d') ?? null
        ];
    }
}
