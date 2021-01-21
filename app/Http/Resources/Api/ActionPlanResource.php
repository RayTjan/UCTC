<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class ActionPlanResource extends JsonResource
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
            'actionPlan_id'=>$this->id,
            'actionPlan_name'=>$this->name,
            'actionPlan_description'=>$this->description,
            'program'=>$this->plansOf->id
        ];
    }
}
