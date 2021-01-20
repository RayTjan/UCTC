<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestefunds = Fund::all()->where('status', '0');
        return view('2ndRoleBlades.listFundProgram',compact('requestefunds'));
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
        Fund::create($request->all());
        return redirect(route('staff.fund.show',$request->program));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $funds = Fund::where('program',$id)->get();

        //check edit
        $edit = false;
        $user = Auth::user();
        $participatedPrograms = $user->attends;
        foreach ($participatedPrograms as $pprogram){
            if ($pprogram->id == $program->id){
                $edit = true;
            }
        }
        if ($program->created_by == $user->id){
            $edit = true;
        }

        return view('2ndRoleBlades.listFundProgram',compact('program','funds','edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
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
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fund = Fund::findOrFail($id);
        $fund->update($request->all());
        return redirect(route('staff.fund.show',$fund->program));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fund = Fund::findOrFail($id);
        $fund->delete();
        return redirect()->route('staff.fund.show', $fund->program);
    }

}
