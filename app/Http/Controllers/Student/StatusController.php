<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Petition01;
use App\Petition02;
use App\Petition03;
use App\Petition04;
use App\Petition05;
use App\Petition06;
use App\Petition07;
use App\Petition08;
use App\Petitionall;
use App\User;
use App\Approve;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class StatusController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $data = Petition01::where('user_id',$userId)
            ->where('approve_id', '<', '8')->get();
        $approve = Petition01::where('user_id',$userId)
            ->where('approve_id' , '8' )->get();
        $approve02 = Petition02::where('user_id',$userId)
            ->where('approve_id' , '11' )->get();
        $approve03 = Petition03::where('user_id',$userId)
            ->where('approve_id' , '11' )->get();
        $approve04 = Petition04::where('user_id',$userId)
            ->where('approve_id' , '11' )->get();
        $data02 = Petition02::where('user_id',$userId)
            ->where('approve_id', '<','11')->get();
        $data03 = Petition03::where('user_id',$userId)
            ->where('approve_id', '<','11')->get();
        $data04 = Petition04::where('user_id',$userId)
            ->where('approve_id', '<','11')->get();
        $data05 = Petition05::where('user_id',$userId)
            ->where('approve_id', '<', '8')->get();
        $data06 = Petition06::where('user_id',$userId)
            ->where('approve_id', '<', '8')->get();
        $data07 = Petition07::where('user_id',$userId)
            ->where('approve_id', '<', '8')->get();
        $data08 = Petition08::where('user_id',$userId)
            ->where('approve_id', '<', '8')->get();

        $all01 = Petition01::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<', '8');
        $all05 = Petition05::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<', '8');
        $all06 = Petition06::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<', '8');
        $all07 = Petition07::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<', '8');
        $all02 = Petition02::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<','11');
        $all03 = Petition03::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<','11');
        $all08 = Petition08::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<','8');
        $union2 = Petition04::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id', '<','11')
        ->unionAll($all01)
        ->unionAll($all02)
        ->unionAll($all03)
        ->unionAll($all05)
        ->unionAll($all06)
        ->unionAll($all07)
        ->unionAll($all08)
        ->orderByDesc('updated_at')
        ->paginate(5, ['*'], 'union2');


        $test = Petition01::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
            ->where('user_id',$userId)
            ->where('approve_id' , '8' );
        $test05 = Petition05::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
            ->where('user_id',$userId)
            ->where('approve_id' , '8' );
        $test06 = Petition06::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
            ->where('user_id',$userId)
            ->where('approve_id' , '8' );
        $test07 = Petition07::select('id','Date','Header','approve_id','petition_id','created_at','updated_at')
            ->where('user_id',$userId)
            ->where('approve_id' , '8' );
        $test02 = Petition02::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
            ->where('user_id',$userId)
            ->where('approve_id' , '11' );
        $test03 = Petition03::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id' , '11' );
        $test08 = Petition08::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id' , '8' );
        $union = Petition04::select('id','Date','Case_radio','approve_id','petition_id','created_at','updated_at')
        ->where('user_id',$userId)
        ->where('approve_id' , '11' )
        ->unionAll($test02)
        ->unionAll($test03)
        ->unionAll($test05)
        ->unionAll($test06)
        ->unionAll($test07)
        ->unionAll($test08)
        ->unionAll($test)
        ->orderByDesc('updated_at')
        ->paginate(5 ,['*'], 'union');
         
        
        
        $data2 = Approve::all();

        return view('student/status',['unions' => $union ],['unions2' => $union2 ])->with('approves', $approve)
        ->with('approves02', $approve02)
        ->with('approves03', $approve03)
        ->with('approves04', $approve04)
        ->with('datas', $data)
        ->with('datas02', $data02)
        ->with('datas03', $data03)
        ->with('datas04', $data04)
        ->with('datas05', $data05)
        ->with('datas06', $data06)
        ->with('datas07', $data07)


        ->with('datas2', $data2);

        
    }
    public function statusdata()
    {
       
        $data = Petitionall::all();
        
        return view('student/viewstatus')->with('datas', $data);
    }
    

    public function edit01(Request $request, $id)
    {
        
        $request->validate([

            'body' => 'required',
            
        ]);

        $update = Petition01::find($id);
        $update->Body = $request->body;
        $update->approve_id = '1';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }
    public function edit02(Request $request, $id)
    {
        
        $request->validate([

            'phone' => 'required',
            'caseRadio' => 'required',
            'status_case1' => 'required',
            'for_case1' => 'required',
            'certTH_case1' => 'required',
            'certEN_case1' => 'required',
            'for_case2' => 'required',
            'certTH_case2' => 'required',
            'certEN_case2' => 'required'
            
        ]);

        $update = Petition02::find($id);
        $update->Phone = $request->phone;
        $update->Case_radio = implode(',', $request->caseRadio);
        $update->Status_case1 = $request->status_case1;
        $update->For_case1 = $request->for_case1;
        $update->CertTH_case1 = $request->certTH_case1;
        $update->CertEN_case1 = $request->certEN_case1;
        $update->For_case2 = $request->for_case2;
        $update->CertTH_case2 = $request->certTH_case2;
        $update->CertEN_case2 = $request->certEN_case2;
        $update->approve_id = '9';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }
    public function edit03(Request $request, $id)
    {
        
        $request->validate([

            'phone' => 'required',
            'degree' => 'required',
            'cert' => 'required',
            'caseRadio' => 'required',
            'certTH_case1' => 'required',
            'certEN_case1' => 'required',
            'certTH_case2' => 'required',
            'certEN_case2' => 'required',
            'certEN_case3' => 'required',
           
            'image'=>'required|file|image|mimes:jpeg,png,jpg|max:5000'
            
        ]);

        $update = Petition03::find($id);
        if($request->hasFile("image")){
            $exists=Storage::disk('local')->exists("public/student_image/". $update->Image);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists){
                  Storage::delete("public/student_image/". $update->Image);
            }
            $request->image->storeAs("public/student_image/", $update->Image);
        }
        $update->Phone = $request->phone;
        $update->Case_radio = implode(',', $request->caseRadio);
        $update->CertTH_case1 = $request->certTH_case1;
        $update->CertEN_case1 = $request->certEN_case1;
        $update->CertTH_case2 = $request->certTH_case2;
        $update->CertEN_case2 = $request->certEN_case2;
       
        $update->approve_id = '9';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }
    public function edit04(Request $request, $id)
    {
        $request->validate([

        
            'idcard' => 'required',
            'birthday' => 'required',
            'sex' => 'required',
            'nationality' => 'required',
            'house_number' => 'required',
            'building' => 'required',
            'floor' => 'required',
            'moo' => 'required',
            'soi' => 'required',
            'street' => 'required',
            'province' => 'required',
            'county' => 'required',
            'district' => 'required',
            'postal_code' => 'required',
            'tel' => 'required',
            'tel_mobile' => 'required',
            'year' => 'required',
            'image'=>'file|image|mimes:jpeg,png,jpg|max:5000',
            'id_card1' => 'mimes:pdf|max:5000',
            'id_card2' => 'mimes:pdf|max:5000',
            'change_name' => 'mimes:pdf|max:5000', 
        ]);
        
       
        
        $update = Petition04::find($id);
        
    
       
        $update->IDcard = $request->idcard;
        $update->Birthday = $request->birthday;
        $update->Sex = $request->sex;
        $update->Nationality = $request->nationality;
        $update->House_number = $request->house_number;
        $update->Building= $request->building;
        $update->Floor = $request->floor;
        $update->Moo = $request->moo;
        $update->Soi = $request->soi;
        $update->Street = $request->street;
        $update->Province = $request->province;
        $update->County = $request->county;
        $update->District = $request->district;
        $update->Postal_code = $request->postal_code;
        $update->Tel = $request->tel;
        $update->Tel_mobile = $request->tel_mobile;
        $update->Year = $request->year;
        $update->Case_radio = implode(',', $request->caseRadio);
        $update->user_id = auth()->user()->id;
        $update->approve_id = '9';
        $update->petition_id = '4';
        $update->save();





         //แก้ไขรูป
         if($update->Case_radio == 'ทำบัตรนักศึกษาใหม่'){

            Storage::delete("public/student_image04/". $update->Image_case1);
            Storage::delete("public/idcard04_card/". $update->Docidcard_case1);
            Storage::delete("public/idcard04_name/". $update->Docidcard_case2);
            Storage::delete("public/docname/". $update->Docname_case2);
            $update->Image_case1=null;
            $update->Docidcard_case1=null;
            $update->Docidcard_case2=null;
            $update->Docname_case2=null;
            //  อัพ รูป ทำบัตร  
            if($request->image !== null){
                $stringImageReFormat=base64_encode('_'.time());
                $ext=$request->file('image')->getClientOriginalExtension();
                $imageName=$stringImageReFormat.".".$ext;
                $imageEncoded=File::get($request->image);
        
                Storage::disk('local')->put('public/student_image04/'.$imageName,$imageEncoded);
            }
                //  อัพ สำเนาบัตรปปช ทำบัตร 
            if($request->id_card1 !== null){
                $stringIDcard1ReFormat=base64_encode('_'.time());
                $extcard=$request->file('id_card1')->getClientOriginalExtension();
                $IDcard1Name=$stringIDcard1ReFormat.".".$extcard;
                $IDcard1Encoded=File::get($request->id_card1);
                
            
                Storage::disk('local')->put('public/idcard04_card/'.$IDcard1Name,$IDcard1Encoded);
            }
           
            
        }


        
        if($update->Case_radio == 'เปลี่ยนชื่อ-สกุล'){

            Storage::delete("public/student_image04/". $update->Image_case1);
            Storage::delete("public/idcard04_card/". $update->Docidcard_case1);
            Storage::delete("public/idcard04_name/". $update->Docidcard_case2);
            Storage::delete("public/docname/". $update->Docname_case2);
            $update->Image_case1=null;
            $update->Docidcard_case1=null;
            $update->Docidcard_case2=null;
            $update->Docname_case2=null;

            if($request->id_card2 !== null){
                $stringIDcard2ReFormat=base64_encode('_'.time());
                $extcard2=$request->file('id_card2')->getClientOriginalExtension();
                $IDcard2Name=$stringIDcard2ReFormat.".".$extcard2;
                $IDcard2Encoded=File::get($request->id_card2);
        
                Storage::disk('local')->put('public/idcard04_name/'.$IDcard2Name,$IDcard2Encoded);
                }
                //  อัพ  สำเนาหลักฐานการเปลี่ยนชื่อ-สกุล
            if($request->change_name !== null){
                $stringDocnameReFormat=base64_encode('_'.time());
                $extDocname=$request->file('change_name')->getClientOriginalExtension();
                $DocnameName=$stringDocnameReFormat.".".$extDocname;
                $DocnameEncoded=File::get($request->change_name);
        
                Storage::disk('local')->put('public/docname/'.$DocnameName,$DocnameEncoded);
        
                }
    
        }

        if($update->Case_radio == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล'){

            Storage::delete("public/student_image04/". $update->Image_case1);
            Storage::delete("public/idcard04_card/". $update->Docidcard_case1);
            Storage::delete("public/idcard04_name/". $update->Docidcard_case2);
            Storage::delete("public/docname/". $update->Docname_case2);
            $update->Image_case1=null;
            $update->Docidcard_case1=null;
            $update->Docidcard_case2=null;
            $update->Docname_case2=null;
            //  อัพ รูป ทำบัตร  
            if($request->image !== null){
                $stringImageReFormat=base64_encode('_'.time());
                $ext=$request->file('image')->getClientOriginalExtension();
                $imageName=$stringImageReFormat.".".$ext;
                $imageEncoded=File::get($request->image);
        
                Storage::disk('local')->put('public/student_image04/'.$imageName,$imageEncoded);
            }
                //  อัพ สำเนาบัตรปปช ทำบัตร 
            if($request->id_card1 !== null){
                $stringIDcard1ReFormat=base64_encode('_'.time());
                $extcard=$request->file('id_card1')->getClientOriginalExtension();
                $IDcard1Name=$stringIDcard1ReFormat.".".$extcard;
                $IDcard1Encoded=File::get($request->id_card1);
                
            
                Storage::disk('local')->put('public/idcard04_card/'.$IDcard1Name,$IDcard1Encoded);
            }
            if($request->id_card2 !== null){
                $stringIDcard2ReFormat=base64_encode('_'.time());
                $extcard2=$request->file('id_card2')->getClientOriginalExtension();
                $IDcard2Name=$stringIDcard2ReFormat.".".$extcard2;
                $IDcard2Encoded=File::get($request->id_card2);
        
                Storage::disk('local')->put('public/idcard04_name/'.$IDcard2Name,$IDcard2Encoded);
            }
                //  อัพ  สำเนาหลักฐานการเปลี่ยนชื่อ-สกุล
            if($request->change_name !== null){
                $stringDocnameReFormat=base64_encode('_'.time());
                $extDocname=$request->file('change_name')->getClientOriginalExtension();
                $DocnameName=$stringDocnameReFormat.".".$extDocname;
                $DocnameEncoded=File::get($request->change_name);
        
                Storage::disk('local')->put('public/docname/'.$DocnameName,$DocnameEncoded);
        
            }
        }

        if($request->image !== null){
            $update->Image_case1=$imageName;
            }
        if($request->id_card1 !== null){
            $update->Docidcard_case1=$IDcard1Name;
            }
        if($request->id_card2 !== null){
            $update->Docidcard_case2=$IDcard2Name;
            }
        if($request->change_name !== null){
            $update->Docname_case2=$DocnameName;
            }
        $update->save();
        return redirect()->action('Student\StatusController@index');
       
    }

    public function edit05(Request $request, $id)
    {
        
        $request->validate([

            'phone' => 'required',
            'startyear' => 'required',
            'sec' => 'required',
            'schoolyear' => 'required',
            'caseRadio' => 'required',
            'reason' => 'required',
            'file_stay' => 'required|mimes:pdf|max:5000',
            
        ]);

        $update = Petition05::find($id);
        if($request->hasFile("file_stay")){
            $exists=Storage::disk('local')->exists("public/file_05/". $update->File_stay);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists){
                  Storage::delete("public/file_05/". $update->File_stay);
            }
            $request->file_stay->storeAs("public/file_05/", $update->File_stay);
        }
        $update->Phone = $request->phone;
        
        $update->Startyear = $request->startyear;
        $update->Sec = $request->sec;
        $update->Schoolyear = $request->schoolyear;
        
        $update->Case_radio = $request->caseRadio;
        $update->Numstay = $request->numstay;
        $update->Secstay = $request->secstay;
        $update->Yearstay = $request->yearstay;

        $update->Reason = $request->reason;
        $update->approve_id = '1';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }

    public function edit06(Request $request, $id)
    {
        
        $request->validate([

            'phone' => 'required',
            'startyear' => 'required',
            'caseRadio' => 'required',
            'file_check' => 'required|mimes:pdf|max:5000',
            
        ]);

        $update = Petition06::find($id);
        if($request->hasFile("file_check")){
            $exists=Storage::disk('local')->exists("public/file_check/". $update->File_check);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists){
                  Storage::delete("public/file_check/". $update->File_check);
            }
            $request->file_check->storeAs("public/file_check/", $update->File_check);
        }

        $update->Phone = $request->phone;
        $update->Startyear_case = $request->startyear;
        $update->Case_radio = $request->caseRadio;

        $update->Startyear = $request->startyear;
        $update->Sec = $request->sec;
        $update->Because = $request->because;

        $update->approve_id = '1';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }
    public function edit07(Request $request, $id)
    {
        
        $request->validate([

            
            'phone' => 'required',
            'startyear' => 'required',
            'sec_out' => 'required',
            'year_out' => 'required',
            'because_out' => 'required',
       
            
        ]);

        $update = Petition07::find($id);

        $update->Phone = $request->phone;
        $update->Startyear = $request->startyear;
        $update->Sec = $request->sec_out;
        $update->Year = $request->year_out;
        $update->Because = $request->because_out;
        $update->approve_id = '1';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }
    public function edit08(Request $request, $id)
    {
        
        $request->validate([

            
            'phone' => 'required',
            'startyear' => 'required',
            'caseRadio' => 'required',
       
            
        ]);

        $update = Petition08::find($id);

        $update->Startyear = $request->startyear;
        $update->Case_radio = $request->caseRadio;
        
        $update->Sec_case1 = $request->sec_case1;
        $update->Year_case1 = $request->year_case1;

        $update->Because_case2 = $request->because_case2;
        $update->Sec_case2 = $request->sec_case2;
        $update->Year_case2 = $request->year_case2;
        $update->Secout_case2 = $request->secout_case2;
        $update->Yearout_case2 = $request->yearout_case2;
        $update->approve_id = '1';
        $update->save();
        return redirect()->action('Student\StatusController@index');
    }

    public function editview($id)
    {
        $show = Petition01::find($id);
        return view('student/edit01',['show01' => $show]);
        
    }
    public function editview2($id)
    {
        $show = Petition02::find($id);
        return view('student/edit02',['show02' => $show]);
        
    }
    public function editview3($id)
    {
        $show = Petition03::find($id);
        return view('student/edit03',['show03' => $show]);
        
    }
    public function editview4($id)
    {
        $show = Petition04::find($id);
        return view('student/edit04',['show04' => $show]);
        
    }
    public function editview5($id)
    {
        $show = Petition05::find($id);
        return view('student/edit05',['show05' => $show]);
        
    }
    public function editview6($id)
    {
        $show = Petition06::find($id);
        return view('student/edit06',['show06' => $show]);
        
    }
    public function editview7($id)
    {
        $show = Petition07::find($id);
        return view('student/edit07',['show07' => $show]);
        
    }
    public function editview8($id)
    {
        $show = Petition08::find($id);
        return view('student/edit08',['show08' => $show]);
        
    }

    
}
