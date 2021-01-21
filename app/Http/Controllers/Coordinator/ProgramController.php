<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Documentation;
use App\Models\Finance;
use App\Models\Program;
use App\Models\Proposal;
use App\Models\Report;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Scalar\String_;
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
        $allprograms = Program::all();

        $programs = $allprograms->sortByDesc('name');

        $page = 'all';

        return view('1stRoleBlades.listProgram', compact('programs','types','categories','page'));
    }

    public function coor()
    {
        $types = Type::all();
        $categories = Category::all();
        $allprograms = Program::all();
        $programs = $allprograms->sortByDesc('name');

        $page = 'all';

        return view('1stRoleBlades.listProgramCoor', compact('programs','types','categories','page'));
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
        return view( '1stRoleBlades.addProgram',compact('users','categories','types', 'clients','committees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (isset($request->thumbnail)){
            $data = $request->validate([
                'thumbnail' => 'image|mimes:png,jpg,jpeg,svg'
            ]);

            $programThumbnail = $data['thumbnail']->getClientOriginalName() . '-' . time() . '.' . $data['thumbnail']->extension();
            $data['thumbnail']->move(public_path('/img/program'), $programThumbnail);

            Program::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'goal' => $request->goal,
                'program_date' => $request->program_date,
                'created_by' => $request->created_by,
                'thumbnail' => $programThumbnail,
                'category' => $request->category,
                'type' => $request->type,
            ]);

        }else{
            Program::create($request->all());
        }

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


        return redirect()->route('coordinator.program.index');
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

        //Proposal terakhir di program itu dengan id program yang sama
        $proposals = Proposal::all()->where('program', $program->id);
        $proposal = $proposals->last();

        //Report terakhir di program itu dengan id program yang sama
        $reports = Report::all()->where('program', $program->id);
        $report = $reports->last();

        return view('1stRoleBlades.detailProgram',compact('program','clients','proposal', 'report'));
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

        //Report terakhir di program itu dengan id program yang sama
        $reports = Report::all()->where('program', $program->id);
        $report = $reports->last();

        return view('1stRoleBlades.editProgram',compact('program','users','categories','types', 'report'));
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
        if (isset($request->thumbnail)){
            $data = $request->validate([
                'thumbnail' => 'image|mimes:png,jpg,jpeg,svg'
            ]);

            $programThumbnail = $data['thumbnail']->getClientOriginalName() . '-' . time() . '.' . $data['thumbnail']->extension();
            $data['thumbnail']->move(public_path('/img/program'), $programThumbnail);

            $program->update([
                'name' => $request->name,
                'description' => $request->description,
                'goal' => $request->goal,
                'program_date' => $request->program_date,
                'thumbnail' => $programThumbnail,
            ]);
        } else{
            $program->update([
                'name' => $request->name,
                'description' => $request->description,
                'goal' => $request->goal,
                'program_date' => $request->program_date,
            ]);
        }

        $data = $request->all();

        //untuk Finances
        foreach ($data['value'] as $item => $value) {
            if (isset($data['proof_of_payment'][$item])){
                $payName = $data['proof_of_payment'][$item]->getClientOriginalName() . '-' . time() . '.' . $data['proof_of_payment'][$item]->extension();
                $data['proof_of_payment'][$item]->move(public_path('/files/finance'), $payName);

                $dataFinance = array(
                    'name' => $data['nameBudget'][$item],
                    'value' => $data['value'][$item],
                    'type' => $data['typeFinance'][$item],
                    'proof_of_payment' => $payName,
                    'program' => $program->id,
                );

                if ($dataFinance['name'] != null && $dataFinance['value'] != null && $dataFinance['type'] != null && $dataFinance['proof_of_payment'] != null){
                    Finance::create($dataFinance);
                }
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


        return redirect()->route('coordinator.program.show', $program);
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
        return redirect()->route('coordinator.program.index');
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

        $page = "type-".$request->value;

        return view('1stRoleBlades.listProgramCoor', compact('programs','types','categories','page'));
    }
    public function filterProgramCategory(Request $request){
        $programs = Program::all()->where('category', $request->value);
//        dd($programs);
        $types = Type::all();
        $categories = Category::all();

        $page = "category-".$request->value;

        return view('1stRoleBlades.listProgramCoor', compact('programs','types','categories','page'));
    }
    public function filterProgramStatus(Request $request){
        $programs = Program::all()->where('status', $request->value);
//        dd($programs);
        $types = Type::all();
        $categories = Category::all();

        $page = "status-".$request->value;

        return view('1stRoleBlades.listProgramCoor', compact('programs','types','categories','page'));
    }
//    public function filterProgramDate(Request $request){
//        $programs = Program::all()->where('category', $request->value);
////        dd($programs);
//        $types = Type::all();
//        $categories = Category::all();
//        return view('1stRoleBlades.listProgram', compact('programs','types','categories'));
//    }

    public function myprogram()
    {
        $types = Type::all();
        $categories = Category::all();

        $user = Auth::user();
        $programs = Program::all();
        $createdPrograms = $programs->where('created_by', $user->id);
        $participatedPrograms = $user->attends;
        $amyPrograms = $createdPrograms->merge($participatedPrograms);

        $myPrograms = $amyPrograms->sortByDesc('name');
        $page = "all";

        return view('1stRoleBlades.listProgramCoor', compact('myPrograms','types','categories','page'));
    }

    public function approve($id){
        $Program = Program::findOrFail($id);
        $Program->update([
            'status' => '1',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to approve")
            : redirect()->back()->with('Success', 'Success program program: #('.$program->name.') approved');
    }

    public function suspend($id){
        $Program = Program::findOrFail($id);
        $Program->update([
            'status' => '3',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to suspend")
            : redirect()->back()->with('Success', 'Success program program: #('.$program->name.') suspended');
    }

    public function finish($id){
        $Program = Program::findOrFail($id);
        $Program->update([
            'status' => '2',
        ]);

        return empty($program) ? redirect()->back()->with('Fail', "Failed to finish")
            : redirect()->back()->with('Success', 'Success program program: #('.$program->name.') finished');
    }

}
