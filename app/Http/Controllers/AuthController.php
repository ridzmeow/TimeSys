<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    
    public function authenticate(Request $request){

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->isNew == True){
                return redirect('setpassword');
            } else{
                return redirect()->intended('home');
            }
        }

        return redirect('login')->with('error', 'Opps! You have entered invalid credentials');
    }

    public function setPassword(){
        return view('auth.setpassword');
    }

    public function savePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:5|confirmed'
        ]);

        $user = User::findOrFail($request->id);
        $user->password = Hash::make($request->password);
        $user->isNew = FALSE;
        $user->update();

        return redirect('login')->with('login', 'Now try to login.');
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('logout', 'User successfully logout');
    }

    public function home(){
        return view('pages.home');
    }
}
