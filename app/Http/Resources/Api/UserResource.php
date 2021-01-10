<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=> $this->identity->name,
            'role_id'=>$this->role_id,
            'department_id'=>$this->identity->department_id,
            'phone_number'=>$this->identity->phone,
            'email'=>$this->email,
            'password'=>$this->password,
            'status'=>$this->status=='1' ? 'Open' : 'Close',
        ];
    }
}
