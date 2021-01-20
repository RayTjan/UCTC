<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Program;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        $requestedPrograms = $programs->where('status', '0');
        $ongoingPrograms = $programs->where('status', '1');
        $finishedPrograms = $programs->where('status', '2');
        $suspendedPrograms = $programs->where('status', '3');
        return view('1stRoleBlades.listProgram', compact('programs','requestedPrograms','ongoingPrograms','finishedPrograms','suspendedPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $types = Type::all();
        return view( '1stRoleBlades.addProgram',compact('users','categories','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Program::create($request->all());
        return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $programs = Program::all()->except($id)->pluck('id');

        $committees = User::whereIn('id',function ($query) use ($programs){
            $query->select('uctc_user_id')->from('uctc_program_user')->where('is_approved','1')->whereNotIn('uctc_program_id',$programs);
        })->get();

        $committeeList = User::whereNotIn('id',function ($query) use ($programs){
            $query->select('uctc_user_id')->from('uctc_program_user')->whereNotIn('uctc_program_id',$programs);
        })->where('role_id',3)->get();

        return view('1stRoleBlades.detailProgram',compact('program','committeeList','committees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $users = User::all();
        $categories = Category::all();
        $types = Type::all();
        return view('1stRoleBlades.editProgram',compact('program','users','categories','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->all());
        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('program.index');
    }

    public function approve($id){
        $Program = Program::findOrFail($id);
        $Program->update([
            'status' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program program: #('.$program->name.') approved');
    }
    public function suspend($id, Request $request){
        $Program = Program::findOrFail($id);
        $Program->update([
            'status' => '3',
            'note' => $request->note,
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to suspend")
            : redirect()->back()->with('Success', 'Success program program: #('.$program->program->name.') suspended');
    }

}
