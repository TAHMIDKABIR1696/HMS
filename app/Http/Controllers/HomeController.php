<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::id())                                            //1
        {
            if (Auth::user()->usertype == 'patient') {             //2
                return view('patient.home');                       //3
            }
            elseif (Auth::user()->usertype == 'doctor') {          //4
                return view('doctor.home');                        //5
            }
            elseif (Auth::user()->usertype == 'admin') {           //6
                return view('admin.home');                         //7
            }
        }
        else {                                                     //8
            return redirect()->back();                             //9
        }
    }
}
