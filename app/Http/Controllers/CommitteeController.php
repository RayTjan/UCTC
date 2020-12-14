<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if ($request->selected_program != null){
//            dd($request->selected_program);
            $attend = $user->attends()->syncWithoutDetaching($request->selected_program, ['is_approved'=>'0']);
            return empty($attend)?redirect()->back()->with('Fail',"Failed to add new committee") : redirect()->back()->with('Success',"committee Added Successfully");
        }
        else{
            return redirect()->back()->with('WHAT',"Failed to add new committee");
        }
    }
    public function approve($id, Request $request){
        $user = User::findOrFail($id);
        $program = $user->attends->where('id','=',$request->selected_program)->first();
        $program->pivot->update([
            'is_approved' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to update status")
            : redirect()->back()->with('Success', 'Success guest: #('.$user->name.') approved');

    }
    public  function reject($id, Request $request)
    {
        $user = User::findOrFail($id);
        $program = $user->attends->where('id', '=', $request->selected_program)->first();
        $program->pivot->update([
            'is_approved' => '2',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to update status")
            : redirect()->back()->with('Success', 'Success guest: #('.$user->name.') approved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
