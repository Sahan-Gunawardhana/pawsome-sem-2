<?php

namespace App\Http\Controllers\WebControllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //loads users into the user table from admin side
    public function dashboard(){
        return view('admin.manageU');
    }
    
    // //deletes the user from the database
    // public function delete(Request $request){
    //     User::find($request->input('user_id'))->delete();
    //     return redirect('admin/manageU');
    // }

}
