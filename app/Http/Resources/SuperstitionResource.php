<?php

namespace App\Http\Resources;

use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Superstition;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SuperstitionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'day'           => $this->day,
            'month'         => $this->month,
            'name'          => $this->name,
            'description'   => $this->description,
            'full_text'     => $this->full_text,
        ];
    }
}
