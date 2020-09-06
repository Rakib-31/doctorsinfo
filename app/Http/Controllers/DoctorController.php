<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function getAll(){
        $doctors = User::all();
        return view('doctors',compact('doctors'));
    }

    public function getAppoinment($id){
        $doctor = User::findorfail($id);
        return vies('appoinment', compact('doctor'));
    }

    public function getProfile($id){
        $doctor = User::findorfail($id);
        return view('profile', compact('doctor'));
        //return response()->json($doctor);
    }
}
