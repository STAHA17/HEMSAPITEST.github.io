<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplianceResource extends JsonResource
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
            'appliance_name' => $this->appliance_name,
            'appliance_watt' => $this->appliance_wattage,
            'appliance_consumption' => $this->appliance_consumption,
            'start_time' => $this -> start_time,
            'end_time' => $this -> end_time,
            'user_id' => $this->user_id,

            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
