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
            'task_id'=>$request->id,
            'task_name'=>$request->name,
            'task_status'=>$request->status,
            'task_description'=>$request->description,
            'due_date'=>$request->due_date,
            'action_plan'=>$request->taskPlan->id,
            'status'=>$request->pic->id,

        ];    }
}
