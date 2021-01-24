<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Jaka;
use App\Models\Lecturer;
use App\Models\Program;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();

        $students = Student::all();
        $staffs = Staff::all();
        $lecturers = Lecturer::all();

        return view('1stRoleBlades.addUser',compact('departments','titles','jakas','staffs','lecturers','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pic = null;

        $request->validate([
            'password' => 'min:6|required_with:repassword|same:repassword',
            'repassword' => 'min:6'
        ]);

        if ($request->picture != null){
            $pic = $request->picture->getClientOriginalName() . '-' . time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('/img/userPic'), $pic);
        }

        if ($request->existing == true){
            $user =  User::create([
                'email' => $request->email,
                'role_id' => $request->role,
                'password' => Hash::make($request->password),
                'is_active'=>"1",
                'is_verified'=>"1",
                'identity_id'=>$request->identity_id,
                'identity_type'=>$request->identity_type,
                'picture'=>$pic,]);
        }
        else{
            if ($request->identity_type == "App\Models\Student"){
                $identity = Student::create([
                    'nim'=>$request->nim,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'batch'=>$request->batch,
                    'description'=>$request->description,
                    'photo'=>$pic,
                    'gender'=>$request->gender,
                    'phone'=>$request->phone,
                    'line_account'=>$request->line_acc,
                    'department_id'=>$request->department_id,
                ]);

                $user =  User::create([
                        'email' => $request->email,
                        'role_id' => $request->role,
                        'password' => Hash::make($request->password),
                        'is_active'=>"1",
                        'is_verified'=>"1",
                        'identity_id'=>$identity->id,
                        'identity_type'=>$request->identity_type,
                        'picture'=>$pic,
                    ]
                );

            }
            else if($request->identity_type == "App\Models\Staff"){
                $identity = Staff::create([
                    'nip'=>$request->nip,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'batch'=>$request->batch,
                    'description'=>$request->description,
                    'photo'=>$pic,
                    'gender'=>$request->gender,
                    'phone'=>$request->phone,
                    'line_account'=>$request->line_acc,
                    'department_id'=>$request->department_id,
                    'title_id'=>$request->title_id,
                ]);

                $user =  User::create([
                        'email' => $request->email,
                        'role_id' => $request->role,
                        'password' => Hash::make($request->password),
                        'is_active'=>"1",
                        'is_verified'=>"1",
                        'identity_id'=>$identity->id,
                        'identity_type'=>$request->identity_type,
                        'picture'=>$pic,
                    ]
                );

            }
            else{
                $identity = Lecturer::create([
                    'nip'=>$request->nip,
                    'nidn'=>$request->nidn,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'batch'=>$request->batch,
                    'description'=>$request->description,
                    'photo'=>$pic,
                    'gender'=>$request->gender,
                    'phone'=>$request->phone,
                    'line_account'=>$request->line_acc,
                    'department_id'=>$request->department_id,
                    'title_id'=>$request->title_id,
                    'jaka_id'=>$request->jaka_id,
                ]);

                $user =  User::create([
                        'email' => $request->email,
                        'role_id' => $request->role,
                        'password' => Hash::make($request->password),
                        'is_active'=>"1",
                        'is_verified'=>"1",
                        'identity_id'=>$identity->id,
                        'identity_type'=>$request->identity_type,
                        'picture'=>$pic,
                    ]
                );

            }
        }


        return redirect (route('coordinator.user.index'));

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
        $departments = Department::all();
        $titles = Title::all();
        $jakas = Jaka::all();

        $user = User::findorFail($id);

        $identity = array();

        return view('1stRoleBlades.editProfile',compact('user', 'identity','departments','titles','jakas'));
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
        $pic = null;

        $request->validate([
            'password' => 'min:6|required_with:bpassword|same:bpassword',
            'newpassword' => 'min:6|required_with:repassword|same:repassword',
            'repassword' => 'min:6'
        ]);

        $user = User::findOrFail($id);

        if ($request->picture != null){
            $pic = $request->picture->getClientOriginalName() . '-' . time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('/img/userPic'), $pic);
        }else {
            $pic = $user->picture;
        }

        if ($user->identity_type == "App\Models\Student"){
            $identity = Student::findOrFail($user->identity_id);
            $identity->update([
                'nim'=>$request->nim,
                'name'=>$request->name,
                'email'=>$request->email,
                'batch'=>$request->batch,
                'description'=>$request->description,
                'photo'=>$pic,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'line_account'=>$request->line_acc,
                'department_id'=>$request->department_id,
            ]);

        }
        else if($user->identity_type == "App\Models\Staff"){
            $identity = Staff::findOrFail($user->identity_id);
            $identity->update([
                'nip'=>$request->nip,
                'name'=>$request->name,
                'email'=>$request->email,
                'batch'=>$request->batch,
                'description'=>$request->description,
                'photo'=>$pic,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'line_account'=>$request->line_acc,
                'department_id'=>$request->department_id,
                'title_id'=>$request->title_id,
            ]);

        }
        else{
            $identity = Lecturer::findOrFail($user->identity_id);
            $identity->update([
                'nip'=>$request->nip,
                'nidn'=>$request->nidn,
                'name'=>$request->name,
                'email'=>$request->email,
                'batch'=>$request->batch,
                'description'=>$request->description,
                'photo'=>$pic,
                'gender'=>$request->gender,
                'phone'=>$request->phone,
                'line_account'=>$request->line_acc,
                'department_id'=>$request->department_id,
                'title_id'=>$request->title_id,
                'jaka_id'=>$request->jaka_id,
            ]);

        }

        $user->update([
                'email' => $request->email,
                'role_id' => $request->role,
                'password' => Hash::make($request->password),
                'is_active'=>"1",
                'is_verified'=>"1",
                'picture'=>$pic,
            ]
        );



        return redirect(route('coordinator.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->identity->delete();
        $user->delete();

        return empty($user) ? redirect()->back()->with('Fail', "Failed to delete")
            : redirect()->back()->with('Success', 'Success delete user:  deleted.');
    }
}
