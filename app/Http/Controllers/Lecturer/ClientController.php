<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('2ndRoleBlades.listClient', compact('clients'));
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
        $client = Client::findOrFail($request->client_id);
        if ($request->selected_program != null){
//            dd($request->selected_program);
            $attend = $client->attends()->syncWithoutDetaching($request->selected_program);
            return empty($attend)?redirect()->back()->with('Fail',"Failed to add new client") : redirect()->back()->with('Success',"Client added successfully");
        }
        else{
            return redirect()->back()->with('WHAT',"Failed to add new committee");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $programs = Program::all()->except($id)->pluck('id');

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

        $clientList = Client::whereNotIn('id',function ($query) use ($programs){
            $query->select('uctc_client_id')->from('uctc_client_program')->whereNotIn('uctc_program_id',$programs);
        })->get();

        return view('2ndRoleBlades.listClient', compact('program','edit','clientList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back();
    }
}
