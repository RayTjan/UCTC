<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {
        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();
        $user->update([
            'activation_token' => null,
            'email_verified_at' => Carbon::now(),//NOT WORKING
            'is_active' => '1',
            'is_verified' => '1'
        ]);
        return redirect()->route('login');
    }
}
