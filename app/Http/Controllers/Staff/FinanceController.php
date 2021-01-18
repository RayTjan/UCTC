<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Program;
use Illuminate\Http\Request;

class FinanceController extends Controller
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
        $data = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'value' => 'required|int',
            'proof_of_payment' => 'image|mimes:png,jpg,jpeg,svg'
        ]);

        $payName = $data['proof_of_payment']->getClientOriginalName() . '-' . time() . '.' . $data['proof_of_payment']->extension();
        $data['proof_of_payment']->move(public_path('/files/finance'), $payName);

        Finance::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'value' => $data['value'],
            'program' => $request->program,
            'proof_of_payment' => $payName,
        ]);
        return redirect(route('staff.finance.show',$request->program));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $finances = Finance::where('program',$id)->get();
        return view('2ndRoleBlades.listFinance',compact('program','finances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        if (isset($request->proof_of_payment)){
            $data = $request->validate([
                'name' => 'required|string',
                'type' => 'required|string',
                'value' => 'required|int',
                'proof_of_payment' => 'image|mimes:png,jpg,jpeg,svg'
            ]);

            $payName = $data['proof_of_payment']->getClientOriginalName() . '-' . time() . '.' . $data['proof_of_payment']->extension();
            $data['proof_of_payment']->move(public_path('/files/finance'), $payName);

            $finance->update([
                'name' => $data['name'],
                'type' => $data['type'],
                'value' => $data['value'],
                'proof_of_payment' => $payName,
            ]);
        }else{
            $data = $request->validate([
                'name' => 'required|string',
                'type' => 'required|string',
                'value' => 'required|int',
            ]);

            $finance->update($data);
        }
        return redirect(route('staff.finance.show',$finance->program));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect()->route('staff.finance.show', $finance->program);
    }
}
