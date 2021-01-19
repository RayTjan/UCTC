<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'task_id'=>$this->id,
            'task_name'=>$this->name,
            'task_status'=>$this->status,
            'task_description'=>$this->description,
            'due_date'=>$this->due_date,
            'action_plan'=>$this->taskPlan->id,
            'PIC'=>$this->pic->id,
        ];    }
}
