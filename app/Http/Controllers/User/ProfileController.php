<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Program;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        return view('3rdRoleBlades.listProgram', compact('programs'));
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
        return view( '3rdRoleBlades.addProgram',compact('users','categories','types'));
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

//        dd(User::whereIn('id',function ($query) use ($programs){
//            $query->select('uctc_user_id')->from('uctc_program_user')->where('is_approved','1')->whereNotIn('uctc_program_id',$programs);
//        })->get());

        return view('3rdRoleBlades.detailProgram',compact('program','committeeList','committees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('3rdRoleBlades.editProgram',compact('program'));

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

}
