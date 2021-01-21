<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('1stRoleBlades.listUser', compact('users'));
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
        if ($request->identity_type == "App\Models\Student"){
            $identity = Student::create([
                'nim'=>$request->nim,
                'name'=>$request->name,
                'email'=>$request->email,
                'batch'=>$request->batch,
                'description'=>$request->description,
                'photo'=>$request->picture,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'line_account'=>$request->line_acc,
                'department_id'=>$request->department_id,
            ]);
        }
        else if($request->identity_type == "App\Models\Staff"){
            $identity = Lecturer::create([
                'nip'=>$request->nip,
                'name'=>$request->name,
                'email'=>$request->email,
                'batch'=>$request->batch,
                'description'=>$request->description,
                'photo'=>$request->picture,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'line_account'=>$request->line_acc,
                'department_id'=>$request->department_id,
                'title_id'=>$request->title_id,
            ]);
        }
        else{
            $identity = Lecturer::create([
                'nip'=>$request->nip,
                'nidn'=>$request->nidn,
                'name'=>$request->name,
                'email'=>$request->email,
                'batch'=>$request->batch,
                'description'=>$request->description,
                'photo'=>$request->picture,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'line_account'=>$request->line_acc,
                'department_id'=>$request->department_id,
                'title_id'=>$request->title_id,
                'jaka_id'=>$request->jaka_id,
            ]);

        }
        $user =  User::create([
                'email' => $request->email,
                'role' => $request->role,
                'password' => $request->password,
                'is_active'=>"1",
                'is_verified'=>"1",
                'identity_id'=>$identity->id,
                'identity_type'=>$request->identity_type,
                'picture'=>$request->picture,
            ]
        );

        return NOTICEMEFREDO;



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findorFail($id);
        return view('1stRoleBlades.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('1stRoleBlades.editProfile',compact('user'));
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
        if ($request->picture != null){
            $data = $request->validate([
                'picture' => 'image|mimes:png,jpg,jpeg,svg'
            ]);

            $imgName = $data['picture']->getClientOriginalName().'-'.time().'.'.$data['picture']->extension();
            $data['picture']->move(public_path('/img/userPic'), $imgName);


            User::where('id', $id)->update([
                'picture' => $imgName,
            ]);
        }else {
            User::where('id', $id)->update([
                'picture' => null,
            ]);
        }

        return redirect(route('coordinator.user.show',\Illuminate\Support\Facades\Auth::id()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
