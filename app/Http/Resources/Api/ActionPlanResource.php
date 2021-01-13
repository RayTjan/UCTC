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
            'actionPlan_id'=>$request->id,
            'actionPlan_name'=>$request->name,
            'actionPlan_description'=>$request->description,
            'program'=>$request->plansOf->id
        ];
    }
}
