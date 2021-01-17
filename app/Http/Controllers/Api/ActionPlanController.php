<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\api\ActionPlanResource;
use App\Models\ActionPlan;
use Illuminate\Http\Request;

class ActionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actionPlan =  ActionPlan::create([
                'name' => $request->name,
                'description' => $request->description,
                'program' => $request->program,
            ]
        );

        return $actionPlan;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actions = ActionPlan::all();
        $specificAction = $actions->where('program', $id);
        return ActionPlanResource::collection($specificAction);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (ActionPlan::find($id)->name !=null){
            ActionPlan::find($id)->update($request->all());
            return response([
                'message' =>  'Task Updated'
            ]);
        }
        else{
            return response([
                'message' => 'Updating Task Failed'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actionPlan = ActionPlan::findOrFail($id);
        $actionPlan->delete();
        return response([
            'message' =>  'Task Deleted'
        ]);

    }
}
