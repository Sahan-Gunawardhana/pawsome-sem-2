<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function create(){
        return  view('auth.admin-login');
    }

    public function store(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))){
            /** @var \App\Models\UserModel1 $user */
            $user = Auth::user();
            if($user->user_type === 'admin'){
                return redirect()->route('admin.home');
            }
            Auth::logout();
            return back()->withErrors(['email'=> 'Unatuhorized login attempt']);
        }
        return back()->withErrors(['email'=>  'Invalid credentials']);
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
