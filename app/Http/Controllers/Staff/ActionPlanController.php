<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\ActionPlan;
use App\Models\Program;
use Illuminate\Http\Request;

class ActionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //action plan yang ada di event tsb
        $actions = ActionPlan::all();
        return view('2ndRoleBlades.listActionPlan', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        return view( '2ndRoleBlades.addActionPlan',compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ActionPlan::create($request->all());
        return redirect()->route('action.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function show(ActionPlan $actionPlan)
    {
        return view('2ndRoleBlades.listTaskAction', compact('actionPlan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(ActionPlan $actionPlan)
    {
        $programs = Program::all();
        return view( '2ndRoleBlades.editActionPlan',compact('actionPlan','programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActionPlan $actionPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActionPlan  $actionPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActionPlan $actionPlan)
    {
        //
    }
}
