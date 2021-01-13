<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program;
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
        $sProgram =  Program::create([
                'name' => $request->name,
                'description' => $request->description,
                'goal' => $request->goal,
                'program_date' => $request->program_date,
                'created_by' => $request->created_by,
            ]
        );

        return $sProgram;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function committees($id)
    {

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
        ]);    }
}
