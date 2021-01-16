<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Api\ProgramResource;
use Laravel\Passport\Client;


class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $programs = Program::all();
        return ProgramResource::collection($programs);
    }
    private $client;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $program =  Program::create([
                'name' => $request->name,
                'description' => $request->description,
                'goal' => $request->goal,
                'program_date' => $request->program_date,
                'created_by' => $request->created_by,
            ]
        );

        return $program;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $programs = Program::all();
        $createdPrograms = $programs->where('created_by', $id);
        $participatedPrograms = $user->attends;
        $mergePrograms = $createdPrograms->merge($participatedPrograms);
        return ProgramResource::collection($mergePrograms);
//        return ProgramResource::collection($participatedPrograms);

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
        if (Program::find($id)->name !=null){
            Program::find($id)->update($request->all());
            return response([
                'message' =>  $request->name
            ]);
        }
        else{
            return response([
                'message' => 'Updating Program Failed'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return response([
            'message' =>  'ProgramDeleted'
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function committees($id){
        $programs = Program::all()->except($id)->pluck('id');
        $committees = User::whereIn('id',function ($query) use ($programs){
            $query->select('uctc_user_id')->from('uctc_program_user')->whereNotIn('uctc_program_id',$programs);
        })->get();
        $program = Program::findOrFail($id);
        $pic = User::findOrFail($program->created_by);
        if ($committees!=null){
            $committees->push($pic);
            return UserResource::collection($committees);
        }
        else{
            return UserResource::collection($pic);
        }
    }
}
