<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    //if the defines user specific routes
    public function index(){
        
        if(Auth::user()->user_type == 'admin'){
            return view('admin.home');
        }

        else{
            return view ('dashboard');
        }
    }
    

   //routes the admin user manager
    public function usersPage(){
        return view('admin.manageU');
    }
    //admin order manager
    public function ordersPage(){
        return view('admin.manageO');
    }

    //admin manage appointments 
    public function appsPage(){
        return view('admin.manageA');
    }
}
