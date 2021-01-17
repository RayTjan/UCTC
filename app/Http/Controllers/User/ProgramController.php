<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Documentation;
use App\Models\Finance;
use App\Models\Program;
use App\Models\Proposal;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $categories = Category::all();

        //fetch myprogram
        $user = Auth::user();
        $allprograms = Program::all();
        $createdPrograms = $allprograms->where('created_by', $user->id);
        $participatedPrograms = $user->attends;
        $programs = $createdPrograms->merge($participatedPrograms);

        return view('3rdRoleBlades.listProgram', compact('programs','types','categories'));
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
        $clients = Client::all();
        $committees = $users->except(\Illuminate\Support\Facades\Auth::user()->id)->whereNotIn('role_id', '1');
        return view( '3rdRoleBlades.addProgram',compact('users','categories','types', 'clients','committees'));
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
        $data = $request->all();
        $lastProgram = Program::all()->last();

        //insert new client to database client and client_program
        if (isset($data['newClient'])) {
            foreach ($data['newClient'] as $item => $value) {
                $dataClient = array(
                    'name' => $data['newClient'][$item],
                    'phone' => $data['phone'][$item],
                    'address' => $data['address'][$item],
                    'email' => $data['email'][$item],
                );
                Client::create($dataClient);

                $lastClient = Client::all()->last();
                $client = Client::findOrFail($lastClient->id);
                $client->attends()->syncWithoutDetaching($lastProgram->id);
            }
        }

        //add existing client to client_program
        if (isset($data['client'])){
            foreach ($data['client'] as $item => $value) {
                $dataClientProgram = array(
                    'client_id' => $data['client'][$item],
                );
                $client = Client::findOrFail($dataClientProgram['client_id']);
                $client->attends()->syncWithoutDetaching($lastProgram->id);
            }
        }


        //insert committee

        if (isset($data['committee'])) {
            foreach ($data['committee'] as $item => $value) {
                $dataCommittee = array(
                    'uctc_user_id' => $data['committee'][$item],
                );
                $committee = User::findOrFail($dataCommittee['uctc_user_id']);
                $committee->attends()->syncWithoutDetaching($lastProgram->id);
            }

        }


        return redirect()->route('student.program.index');
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

        //get clients

        $clients = Client::whereIn('id',function ($query) use ($programs){
            $query->select('uctc_client_id')->from('uctc_client_program')->whereNotIn('uctc_program_id',$programs);
        })->get();

        //akan segera dihapus

        $committees = User::whereIn('id',function ($query) use ($programs){
            $query->select('uctc_user_id')->from('uctc_program_user')->where('is_approved','1')->whereNotIn('uctc_program_id',$programs);
        })->get();

        $committeeList = User::whereNotIn('id',function ($query) use ($programs){
            $query->select('uctc_user_id')->from('uctc_program_user')->whereNotIn('uctc_program_id',$programs);
        })->where('role_id',3)->get();

        //batas hapus

        return view('3rdRoleBlades.detailProgram',compact('program','clients','committeeList','committees'));
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
        return view('3rdRoleBlades.editProgram',compact('program','users','categories','types'));
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
        $data = $request->all();
        $program->update($request->all());


        //untuk Finances
        foreach ($data['value'] as $item => $value) {
            $dataFinance = array(
                'name' => $data['nameBudget'][$item],
                'value' => $data['value'][$item],
                'type' => $data['typeFinance'][$item],
                'program' => $program->id,
            );

            if (!isEmpty($dataFinance['name'])&&!isEmpty($dataFinance['value'])){
                dd($dataFinance['type']);
                Finance::create($dataFinance);
            }
        }

        //untuk Documentation
        if (isset($data['documentation'])) {
            foreach ($data['documentation'] as $item => $value) {

                $imgName = $data['documentation'][$item]->getClientOriginalName() . '-' . time() . '.' . $data['documentation'][$item]->extension();
                $data['documentation'][$item]->move(public_path('/img/documentation'), $imgName);

                $dataDoc = array(
                    'documentation' => $imgName,
                    'program' => $program->id,
                );

                Documentation::create($dataDoc);
            }
        }

        //untuk Proposal
        if ($request->proposal != null) {
            $pdf = $request->validate([
                'proposal' => 'required|mimes:pdf|max:10000',
            ]);

            $pdfName = $pdf['proposal']->getClientOriginalName().'-'.time().'.'.$pdf['proposal']->extension();
            $pdf['proposal']->move(public_path('/files/proposal'), $pdfName);

            $dataProposal = array(
                'proposal' => $pdfName,
                'status' => '0',
                'program' => $program->id,
            );

            Proposal::create($dataProposal);
        }


        return redirect()->route('student.program.show', $program);
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
        return redirect()->route('student.program.index');
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterProgramType(Request $request){
        $programs = Program::all()->where('type', $request->value);
//        dd($programs);
        $types = Type::all();
        $categories = Category::all();
        return view('3rdRoleBlades.listProgram', compact('programs','types','categories'));
    }
    public function filterProgramCategory(Request $request){
        $programs = Program::all()->where('category', $request->value);
//        dd($programs);
        $types = Type::all();
        $categories = Category::all();
        return view('3rdRoleBlades.listProgram', compact('programs','types','categories'));
    }
    public function filterProgramStatus(Request $request){
        $programs = Program::all()->where('status', $request->value);
//        dd($programs);
        $types = Type::all();
        $categories = Category::all();
        return view('3rdRoleBlades.listProgram', compact('programs','types','categories'));
    }
//    public function filterProgramDate(Request $request){
//        $programs = Program::all()->where('category', $request->value);
////        dd($programs);
//        $types = Type::all();
//        $categories = Category::all();
//        return view('3rdRoleBlades.listProgram', compact('programs','types','categories'));
//    }
}
