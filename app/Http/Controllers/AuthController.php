<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login.login');
    }

    public function login(Request $request){
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($user)){
            return redirect('/posts');
        }

        return back()->with('email', 'Invalid Email or Password');
    }

    public function showRegister(){
        return view('login.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        auth()->login($user);

        return redirect('/posts');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
