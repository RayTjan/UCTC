<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dana;
use App\Models\Program;
use Illuminate\Http\Request;

class PencairanDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requesteddanas = Dana::all()->where('status', '0');
        return view('1stRoleBlades.listPencairanDana',compact('requesteddanas'));
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
        Dana::create($request->all());
        return redirect(route('admin.dana.show',$request->program));
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
        $danas = Dana::where('program',$id)->get();
        return view('1stRoleBlades.listDanaProgram',compact('program','danas'));
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
        $dana = Dana::findOrFail($id);
        $dana->update($request->all());
        return redirect(route('admin.dana.show',$dana->program));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dana = Dana::findOrFail($id);
        $dana->delete();
        return redirect()->route('admin.dana.show', $dana->program);
    }

    public function approve($id){
        $dana = Dana::findOrFail($id);
        $dana->update([
            'status' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program dana: #('.$dana->program->name.') approved');
    }
    public function reject($id, Request $request){
        $dana = Dana::findOrFail($id);
        $dana->update([
            'status' => '2',
            'note' => $request->note,
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to reject")
            : redirect()->back()->with('Success', 'Success program dana: #('.$dana->program->name.') Rejected');
    }

}
