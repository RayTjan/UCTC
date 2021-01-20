<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Models\Fund;
use App\Models\Program;
use Illuminate\Http\Request;

class FundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestedfunds = Fund::all()->where('status', '0');
        return view('1stRoleBlades.listFund',compact('requestedfunds'));
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
        return redirect(route('coordinator.dana.show',$request->program));
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
        return view('1stRoleBlades.listFundProgram',compact('program','funds'));
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
        return redirect(route('coordinator.fund.show',$fund->program));
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
        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program fund: #('.$fund->program->name.') approved');
    }

    public function approve($id){
        $fund = Fund::findOrFail($id);
        $fund->update([
            'status' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program fund: #('.$fund->program->name.') approved');
    }
    public function reject($id, Request $request){
        $fund = Fund::findOrFail($id);
        $fund->update([
            'status' => '2',
            'note' => $request->note,
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to reject")
            : redirect()->back()->with('Success', 'Success program fund: #('.$fund->program->name.') Rejected');
    }

}
