<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Petition02;
use App\Petition03;
use App\Petition04;
use App\User;
use App\Approve;
use Illuminate\Support\Facades\Auth;
use App\Allcsv;

class HistoryController extends Controller
{
    public function index()
    {
        $data = Petition02::where('approve_id' , '9' )->get();
        $data03 = Petition03::where('approve_id' , '9' )->get();
        $data04 = Petition04::where('approve_id' , '9' )->get();            
        $data2 = Approve::all();

      
        $test02 = Petition02::select('id','Date','Case_radio','studentcsv_id','approve_id','petition_id','updated_at')
        ->where('approve_id' , '9' );
        $test03 = Petition03::select('id','Date','Case_radio','studentcsv_id','approve_id','petition_id','updated_at')
        ->where('approve_id' , '9' );
        $union2 = Petition04::select('id','Date','Case_radio','studentcsv_id','approve_id','petition_id','updated_at')
        ->where('approve_id' , '9' )
        ->unionAll($test02)
        ->unionAll($test03)
        ->orderByDesc('updated_at')
        ->paginate(5,['*'], 'union');

       
        $approve02 = Petition02::select('id','Date','Case_radio','studentcsv_id','approve_id','petition_id','updated_at')
            ->where('approve_id' , '11' );
        $approve03 = Petition03::select('id','Date','Case_radio','studentcsv_id','approve_id','petition_id','updated_at')
        ->where('approve_id' , '11' );
        $union = Petition04::select('id','Date','Case_radio','studentcsv_id','approve_id','petition_id','updated_at')
        ->where('approve_id' , '11' )
        ->unionAll($approve02)
        ->unionAll($approve03)
        ->orderByDesc('updated_at')
        ->paginate(5);

        return view('register/history',['unions' => $union ],['unions2' => $union2 ])
        ->with('datas', $data)
        ->with('datas03', $data03)
        ->with('datas04', $data04)
        ->with('datas2', $data2);
    }
    public function viewnoapprove02($id)
    {
        $show = Petition02::find($id);
        return view('register/noapprove02',['show02' => $show]);
    }
    public function viewnoapprove03($id)
    {
        $show = Petition03::find($id);
        return view('register/noapprove03',['show03' => $show]);
    }
    public function viewnoapprove04($id)
    {
        $show = Petition04::find($id);
        return view('register/noapprove04',['show04' => $show]);
    }
    public function indexapprove02($id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail)->get();
        $show = Petition02::find($id);
        return view('register/approve02')
        ->with('shows', $show)
        ->with('users', $user);
    }
    public function indexapprove03($id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail)->get();
        $show = Petition03::find($id);
        return view('register/approve03')
        ->with('shows', $show)
        ->with('users', $user);
    }
    public function indexapprove04($id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail)->get();
        $show = Petition04::find($id);
        return view('register/approve04')
        ->with('shows', $show)
        ->with('users', $user);
        
       
    }
    
    public function registernoapprove02(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition02::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '10';
        $update->save();
        return view('home');
    }
    public function registernoapprove03(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition03::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '10';
        $update->save();
        return view('home');
    }
    public function registernoapprove04(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition04::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '10';
        $update->save();
        return view('home');
    }
}

