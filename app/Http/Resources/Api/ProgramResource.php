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
            'program_id' => $this->id,
            'program_title'=> $this->name,
            'program_status'=> $this->status,
            'description'=>$this->description,
            'goal'=>$this->goal,
            'created_by'=>$this->creator->identity->name,
            'program_date'=>$this->program_date,
            'thumbnail'=>$this->thumbnail,
        ];
    }
}
