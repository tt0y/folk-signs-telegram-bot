<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuperstitionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'day' => $this->day,
            'month' => $this->month,
            'name' => $this->name,
            'description' => $this->description,
            'full_text' => $this->full_text,
        ];
    }
}
