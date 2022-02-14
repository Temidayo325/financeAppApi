<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DemographicResource extends JsonResource
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
                'user_id' => $this->user_token,
                'age' => $this->age,
                'occupation' => $this->occupation,
                'income' => $this->income 
            ];
    }

    public function with($request)
    {
        return [
            'status' => 1,
            'message' => 'Profile updated successfully'
        ];
    }
}