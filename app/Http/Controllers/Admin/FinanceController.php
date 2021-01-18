<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Program;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestedFinances = Finance::all()->where('status', '0');
        return view('1stRoleBlades.listFinance',compact('requestedFinances'));
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
        Finance::create($request->all());
        return redirect(route('admin.finance.show',$request->program));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $finances = Finance::where('program',$id)->get();
        return view('1stRoleBlades.listFinance',compact('program','finances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        $finance->update($request->all());
        return redirect(route('admin.finance.show',$finance->program));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect()->route('admin.finance.show', $finance->program);
    }

    public function approve($id){
        $finance = Finance::findOrFail($id);
        $finance->update([
            'status' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program finance: #('.$finance->program->name.') approved');
    }
    public function reject($id, Request $request){
        $finance = Finance::findOrFail($id);
        $finance->update([
            'status' => '2',
            'note' => $request->note,
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to reject")
            : redirect()->back()->with('Success', 'Success program finance: #('.$finance->program->name.') Rejected');
    }

}
