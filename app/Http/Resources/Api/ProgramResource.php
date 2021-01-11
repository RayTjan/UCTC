<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            'program_title'=> $this->name,
            'description'=>$this->description,
            'goal'=>$this->goal,
            'created_by'=>$this->creator->identity->name,
            'program_date'=>$this->program_date,
            'status'=>$this->status=='1' ? 'Open' : 'Close',
        ];
    }
}
