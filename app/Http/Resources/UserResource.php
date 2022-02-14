<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use JWTAuth;

class UserResource extends JsonResource
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
                'name' => $this->name,
                'email' => $this->email,
                'user_id'=> $this->user_token,
                'gender' => $this->gender, 
                'created_at' => Carbon::create($this->created_at)->diffForHumans()
        ];  
        // return parent::toArray($request);
    }
    public function with($request)
    {
        return [
            'status' => 1,
            'token' => JWTAuth::fromUser(Auth()->user())
            // 'message' => 'Account created succefully'
        ];
    }
}