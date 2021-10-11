<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Studentcsv;
use App\teachercsv;
use App\Allcsv;
use App\User;


class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $usermail = Auth::user()->email;
        $mail = Studentcsv::where('Mail', $usermail)->first();
        if(! $mail){

            Session()->flash('error','กรุณาเข้าสู่ระบบด้วยอีเมลของทางมหาวิทยาลัย');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
