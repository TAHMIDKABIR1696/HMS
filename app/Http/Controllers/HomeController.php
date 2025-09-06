<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Helpers\Singleton; 

class HomeController extends Controller
{
    public function redirect()
    {
        
        $config = Singleton::getInstance();


        if (Auth::id())                                            
        {
            if (Auth::user()->usertype == 'patient') {             
                return view('patient.home');                       
            }
            elseif (Auth::user()->usertype == 'doctor') {         
                return view('doctor.home');                        
            }
            elseif (Auth::user()->usertype == 'admin') {           
                return view('admin.home');                         
            }
        }
        else {                                                    
            return redirect()->back();                             
        }
    }
}