<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FcmNotifyResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "user_id"=> $this->user_id,
            "type"=> $this->type,
            "order_id"=> $this-> order_id,
            "message"=> $this-> message,
            "created_at"=> $this->created_at?->format('Y-m-d') ?? null,
            "updated_at"=> $this-> updated_at?->format('Y-m-d') ?? null
        ];
    }
}
