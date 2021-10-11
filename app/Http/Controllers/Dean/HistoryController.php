<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Petition01;
use App\Petition05;
use App\Petition06;
use App\Petition07;
use App\Petition08;
use App\User;
use App\Approve;
use Illuminate\Support\Facades\Auth;
use App\Allcsv;

class HistoryController extends Controller
{
    public function index()
    {
        $data = Petition01::where('approve_id' , '3' )->get();;
        $data05 = Petition05::where('approve_id' , '3' )->get();
        $data06 = Petition06::where('approve_id' , '3' )->get();
        $approve = Petition01::where('approve_id' ,'>', '3' )->get();
        $approve05 = Petition05::where('approve_id' ,'>', '3' )->get();
        $approve06 = Petition06::where('approve_id' ,'>', '3' )->get();
        $data2 = Approve::all();

        $test08 = Petition08::select('id','Date','Case_radio','approve_id','studentcsv_id','petition_id','created_at')
            ->where('approve_id' , '3' );
        $test07 = Petition07::select('id','Date','Header','approve_id','studentcsv_id','petition_id','created_at')
            ->where('approve_id' , '3' );
        $test05 = Petition05::select('id','Date','Header','approve_id','studentcsv_id','petition_id','created_at')
        ->where('approve_id' , '3' );
        $test06 = Petition06::select('id','Date','Header','approve_id','studentcsv_id','petition_id','created_at')
        ->where('approve_id' , '3' );
        $union = Petition01::select('id','Date','Header','approve_id','studentcsv_id','petition_id','created_at')
        ->where('approve_id' , '3' )
        ->unionAll($test07)
        ->unionAll($test05)
        ->unionAll($test06)
        ->unionAll($test08)
        ->orderByDesc('created_at')
        ->paginate(5,['*'], 'union');

        $unionapprove08 = Petition08::select('id','Date','Case_radio','studentcsv_id','petition_id','updated_at')
        ->where('approve_id' ,'8');
        $unionapprove07 = Petition07::select('id','Date','Header','studentcsv_id','petition_id','updated_at')
        ->where('approve_id' ,'8');
        $unionapprove05 = Petition05::select('id','Date','Header','studentcsv_id','petition_id','updated_at')
        ->where('approve_id' ,'8');
        $unionapprove06 = Petition06::select('id','Date','Header','studentcsv_id','petition_id','updated_at')
        ->where('approve_id','8');
        $unionapprove = Petition01::select('id','Date','Header','studentcsv_id','petition_id','updated_at')
        ->where('approve_id' ,'8')
        ->unionAll($unionapprove07)
        ->unionAll($unionapprove05)
        ->unionAll($unionapprove06)
        ->unionAll($unionapprove08)
        ->orderByDesc('updated_at')
        ->paginate(5,['*'], 'unionapprove');

        
        return view('dean/history',['unions' => $union ],['unionsapprove' => $unionapprove ])
        ->with('approves', $approve)->with('datas', $data)->with('datas2', $data2);
    }
    public function viewnoapprove($id)
    {
        $show = Petition01::find($id);
        return view('dean/noapprove',['show01' => $show]);
    }
    public function viewnoapprove05($id)
    {
        $show = Petition05::find($id);
        return view('dean/noapprove05',['show05' => $show]);
    }
    public function viewnoapprove06($id)
    {
        $show = Petition06::find($id);
        return view('dean/noapprove06',['show06' => $show]);
    }
    public function viewnoapprove07($id)
    {
        $show = Petition07::find($id);
        return view('dean/noapprove07',['show07' => $show]);
    }
    public function viewnoapprove08($id)
    {
        $show = Petition08::find($id);
        return view('dean/noapprove08',['show08' => $show]);
    }
    public function indexapprove($id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail)->get();
        $show = Petition01::find($id);
        return view('dean/approve')
        ->with('shows', $show)
        ->with('users', $user);
    }
    public function index08approve($id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail)->get();
        $show = Petition08::find($id);
        return view('dean/approve08')
        ->with('shows', $show)
        ->with('users', $user);
    }
    public function Deannoapprove(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition01::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '7';
        $update->save();
        return view('home');
    }
    public function Deannoapprove05(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition05::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '7';
        $update->save();
        return view('home');
    }
    public function Deannoapprove06(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition06::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '7';
        $update->save();
        return view('home');
    }
    public function Deannoapprove07(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition07::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '7';
        $update->save();
        return view('home');
    }
    public function Deannoapprove08(Request $request, $id)
    {
        
        $request->validate([

            'advice' => 'required',
            
        ]);

        $update = Petition08::find($id);
        $update->Advice = $request->advice;
        $update->approve_id = '7';
        $update->save();
        return view('home');
    }
}
