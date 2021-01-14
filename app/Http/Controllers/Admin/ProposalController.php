<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::all()->where('status','0');
        return view('1stRoleBlades.listRequest', compact('proposals'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('staff.proposal.show',$proposal->program);
    }

    public function approve($id){
        $proposal = Proposal::findOrFail($id);
        $proposal->update([
            'status' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program proposal: #('.$proposal->program->name.') approved');
    }
    public function reject($id){
        $proposal = Proposal::findOrFail($id);
        $proposal->update([
            'status' => '2',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to reject")
            : redirect()->back()->with('Success', 'Success program proposal: #('.$proposal->program->name.') Rejected');
    }

    public function download($id){
        $proposal = Proposal::findOrFail($id);
        dd($id);
        $file = public_path(('/files/proposal'), $proposal->proposal);
        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($file, $proposal->proposal, $headers);
        return redirect(route('admin.proposal.show',$proposal->program));
    }
}
