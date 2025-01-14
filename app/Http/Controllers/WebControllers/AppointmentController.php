<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class AppointmentController extends Controller
{   

    //loads appointments 
    public function index(){
        $appointments = Appointment::with('customer')->get();
        return view('admin.manageA', ['appointments'=> $appointments]);
    }
    //deletes an appointment
    public function delete(Request $request){
        Appointment::find($request->input('appointment_id'))->delete();
        return redirect('admin/manageA');
    }

    //lets user access appointments page
    public function Uindex(){
        return view ('appointment');
    }

    //lets users make an appointment
    public function create(Request $req){
        $customerId = Auth::id();

        Appointment::create([
            'customer_id' => $customerId,
            'pet_name' => $req->input('pet_name'),
            'drop_off_date' => $req->input('drop_off_date'),
            'pick_up_date' => $req->input('pick_up_date'),
            'description' => $req->input('description'),
            'status' =>  'upcoming'
        ]);
        
        return redirect('appointments');
    }

}
