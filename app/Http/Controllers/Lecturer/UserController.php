<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use App\Models\Staff;
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
        return view('2ndRoleBlades.listUser', compact('users'));
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
        //
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
        return view('2ndRoleBlades.profile',compact('user'));
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
        $identity = array();

        if ($user->identity_type == 'App\Models\Lecturer') {
            $identity = Lecturer::findOrFail($user->identity_id);
        }else if ($user->identity_type == 'App\Models\Staff') {
            $identity = Staff::findOrFail($user->identity_id);
        }else if ($user->identity_type == 'App\Models\Student') {
            $identity = Student::findOrFail($user->identity_id);
        }

        return view('2ndRoleBlades.editProfile',compact('user', 'identity'));
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

        return redirect(route('lecturer.user.show',\Illuminate\Support\Facades\Auth::id()));
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
