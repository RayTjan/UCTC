<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
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
        $pdf = $request->validate([
            'proposal' => 'required|mimes:pdf|max:10000',
        ]);

        $pdfName = $pdf['proposal']->getClientOriginalName().'-'.time().'.'.$pdf['proposal']->extension();
        $pdf['proposal']->move(public_path('/files/proposal'), $pdfName);

        $dataProposal = array(
            'proposal' => $pdfName,
            'status' => '0',
            'program' => $request->selected_program,
        );

        Proposal::create($dataProposal);
        return redirect(route('staff.proposal.show', $request->selected_program));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $proposals = Proposal::where('program', $id)->get();

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
        $lastProposal = $proposals->get()->last();
        $addAvailability = true;
        if ($lastProposal != null){
            if ($lastProposal->status == '0' || $lastProposal->status = '1'){
                $addAvailability = false;
            }
        }

        return view('2ndRoleBlades.listProposal', compact('proposals', 'program','edit','addAvailability'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        return view('2ndRoleBlades.editProposal', compact('proposal'));
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
        $pdf = $request->validate([
            'proposal' => 'required|mimes:pdf|max:10000',
        ]);

        $pdfName = $pdf['proposal']->getClientOriginalName().'-'.time().'.'.$pdf['proposal']->extension();
        $pdf['proposal']->move(public_path('/files/proposal'), $pdfName);

        $dataProposal = array(
            'proposal' => $pdfName,
            'status' => '0',
            'program' => $request->selected_program,
        );

        $proposal->update([
            'proposal' => $dataProposal['proposal']
        ]);
        return redirect(route('staff.proposal.show', $request->selected_program));
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



}
