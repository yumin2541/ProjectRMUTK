<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Studentcsv;
use App\teachercsv;
use App\Allcsv;
use App\User;
use App\Http\Middleware\VerifyUser;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('verifyUser')->only(['index']);
    }
    public function index()
    {
        
        $usermail = Auth::user()->email;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
                     
 					
        return view('profile')->with('users', $user);
    }
    public function index2()
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail)->get();
        return view('profileall')->with('users', $user);
    }
    
}
