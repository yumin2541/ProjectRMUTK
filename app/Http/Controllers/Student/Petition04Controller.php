<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petition04;
use App\Petitionall;
use App\Studentcsv;
use App\User;
use App\Approve;
use PDF;
use PDF2;
use DateTimeZone;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Allcsv;

class Petition04Controller extends Controller
{
    public function petition04()
    {
        $usermail = Auth::user()->email;
        $userid = Auth::user()->id;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
        return view('student/petition04')->with('users', $user)->with('usersid', $userid);
    }

    public function store(Request $request)
    {
        $request->validate([

            'date' => 'required',
            'dear' => 'required',
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
            'caseRadio' => 'required',
            
            'image'=>'file|image|mimes:jpeg,png,jpg|max:5000',
            'id_card1' => 'mimes:pdf|max:5000',
            'id_card2' => 'mimes:pdf|max:5000',
            'change_name' => 'mimes:pdf|max:5000', 
        ]);
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
        //  อัพ สำเนาบัตรปปช เปลี่ยนชื่อ 
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
        $petition04=new Petition04;
        
 
        $petition04->Date = $request->date;
        $petition04->Dear = $request->dear;
        
        $id = $request->idstudent;
        $user = Studentcsv::where('IDstudent' , $id)->get();
        $data =  $user->first()->id;

        $petition04->studentcsv_id =  $data;

        $petition04->IDcard = $request->idcard;
        $petition04->Birthday = $request->birthday;
        $petition04->Sex = $request->sex;
        $petition04->Nationality = $request->nationality;
        $petition04->House_number = $request->house_number;
        $petition04->Building= $request->building;
        $petition04->Floor = $request->floor;
        $petition04->Moo = $request->moo;
        $petition04->Soi = $request->soi;
        $petition04->Street = $request->street;
        $petition04->Province = $request->province;
        $petition04->County = $request->county;
        $petition04->District = $request->district;
        $petition04->Postal_code = $request->postal_code;
        $petition04->Tel = $request->tel;
        $petition04->Tel_mobile = $request->tel_mobile;
        $petition04->Year = $request->year;
        $petition04->Case_radio = implode(',', $request->caseRadio);
        if($request->image !== null){
        $petition04->Image_case1=$imageName;
        }
        if($request->id_card1 !== null){
        $petition04->Docidcard_case1=$IDcard1Name;
        }
        if($request->id_card2 !== null){
        $petition04->Docidcard_case2=$IDcard2Name;
        }
        if($request->change_name !== null){
        $petition04->Docname_case2=$DocnameName;
        }
        $petition04->user_id = auth()->user()->id;
        $petition04->approve_id = '9';
        $petition04->petition_id = '4';
        $petition04->save();
        return redirect()->action('Student\StatusController@index');
    }

    public function destroy($id)
    {
        $petition04=Petition04::find($id);
        $exists=Storage::disk('local')->exists("public/student_image04/".$petition04->Image_case1);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists){
                  Storage::delete("public/student_image04/".$petition04->Image_case1);
            }
        $exists2=Storage::disk('local')->exists("public/idcard04_card/".$petition04->Docidcard_case1);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists2){
                  Storage::delete("public/idcard04_card/".$petition04->Docidcard_case1);
            }
        $exists3=Storage::disk('local')->exists("public/idcard04_name/".$petition04->Docidcard_case2);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists3){
                  Storage::delete("public/idcard04_name/".$petition04->Docidcard_case2);
            }
        $exists4=Storage::disk('local')->exists("public/docname/".$petition04->Docname_case2);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists4){
                  Storage::delete("public/docname/".$petition04->Docname_case2);
            }
        

        Petition04::destroy($id);
        return redirect()->back();
    }

    public function show($id)
    {
        $show = Petition04::find($id);
        return view('petition/form04',['show04' => $show]);
    }

    public function registerapprove(Request $request, $id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;

        

        $date = date("d-m-Y");
        $sig_register = $titlename ." ". $fname ." ". $lname;
        $update = Petition04::find($id);
        $update->approve_id = '11';
        $update->Sig_register = $sig_register;
        $update->Dateapprove_register = $date;

        $update->Status_stu = '-';
        $update->Daystart_card = '-';
        $update->Dayend_card = '-';

        $update->save();
        return redirect()->action('Register\HistoryController@index');
    }

    public function registerapprovecard(Request $request, $id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;

        $request->validate([

            'status_stu' => 'required',
            'daystart_card' => 'required',
            'dayend_card' => 'required',
          
        ]);

        $date = date("d-m-Y");
        $sig_register = $titlename ." ". $fname ." ". $lname;
        $update = Petition04::find($id);
        $update->approve_id = '11';
        $update->Sig_register = $sig_register;

        $update->Status_stu = $request->status_stu;
        $update->Daystart_card = $request->daystart_card;
        $update->Dayend_card = $request->dayend_card;

        $update->Dateapprove_register = $date;
        $update->save();
        return redirect()->action('Register\HistoryController@index');
    }

    public function downloadPDF($id)
    {
        $pdfpetition = Petition04::find($id);
        
        $strDate = $pdfpetition->Date; 
        $strDateregister = $pdfpetition->Dateapprove_register; 

        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strMonth2= date("m",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        
        $strYearregister = date("Y",strtotime($strDateregister))+543;
        $strMonthregister= date("m",strtotime($strDateregister));
        $strDayregister= date("j",strtotime($strDateregister));
       

		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม ","พฤศจิกายน","ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
        
        
        $view = \View::make('student.pdf4',compact('pdfpetition'))
            ->with('strYearsregister', $strYearregister) 
            ->with('strMonthsregister', $strMonthregister) 
            ->with('strDaysregister', $strDayregister) 
            
            
            ->with('strYears', $strYear)
            ->with('strMonthThais', $strMonthThai)
            ->with('strMonths', $strMonth2)
            ->with('strDays', $strDay);
        $html = $view->render();
        $pdf = new PDF();

        PDF::setHeaderCallback(function($pdf){
            
            $image_file = "https://www.rmutk.ac.th/wp-content/uploads/2017/10/cropped-UTK-LOGO-1.png";
            $pdf->Image($image_file, 10, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $pdf->SetFont('THSarabunNew', '', 15);
        });

        PDF::setFooterCallback(function($pdf) {
            $image_file = "http://www.ascar.rmutk.ac.th/system/wp-content/uploads/2020/06/cropped-Header-Ascar-01.jpg";
            $pdf->Image($image_file, 10, 280, 100, '', 'jpg', '', 'T', false, 300, '', false, false, 0, false, false, false);
            $pdf->SetY(-15);
            $pdf->SetFont('THSarabunNew', '', 15);
    
        });
        PDF::SetTitle('สวท.04 ใบขอเปลี่ยนชื่อนามสกุลและทำบัตร');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);   
        PDF::AddPage('', 'A4');
        PDF::SetFont('THSarabunNew', '', 15);
        PDF::SetY(1);
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('report.pdf');
    }

}
