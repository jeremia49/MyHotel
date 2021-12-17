<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function gregister(){
        return view('register');
    }

    public function pregister(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:8',
        ]);

        $check = User::create($validated);

        if($check){
            return redirect()->route('login')->with('success','Akun anda berhasil didaftarkan , silahkan login');
        }

        return redirect()->back()->with('error','Something Wrong');;
    }

    public function glogin(){
        return view('login');
    }

    public function plogin(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember_me' => ['nullable'],
        ]);

        $remember_me = $validated === null ? false : true;

        if (Auth::attempt(['email' => $validated['email'] , 'password' => $validated['password']],$remember_me)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Email / Password salah/tidak ditemukan',
        ]);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
