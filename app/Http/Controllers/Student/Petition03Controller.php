<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petition03;
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

class Petition03Controller extends Controller
{
    public function petition03()
    {
        $usermail = Auth::user()->email;
        $userid = Auth::user()->id;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
        return view('student/petition03')->with('users', $user)->with('usersid', $userid);
    }

    public function store(Request $request)
    {
        $request->validate([

            'date' => 'required',
            'dear' => 'required',
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

        $stringImageReFormat=base64_encode('_'.time());
        $ext=$request->file('image')->getClientOriginalExtension();
        $imageName=$stringImageReFormat.".".$ext;
        $imageEncoded=File::get($request->image);

        Storage::disk('local')->put('public/student_image/'.$imageName,$imageEncoded);

        $petition03=new Petition03;
        
        $petition03->Date = $request->date;
        $petition03->Dear = $request->dear;
       
        $id = $request->idstudent;
        $user = Studentcsv::where('IDstudent' , $id)->get();
        $data =  $user->first()->id;

        $petition03->studentcsv_id =  $data;

        $petition03->Phone = $request->phone;
        $petition03->Degree = $request->degree;
        $petition03->Cert = $request->cert;

        $petition03->Case_radio = implode(',', $request->caseRadio);
        $petition03->CertTH_case1 = $request->certTH_case1;
        $petition03->CertEN_case1 = $request->certEN_case1;
        $petition03->CertTH_case2 = $request->certTH_case2;
        $petition03->CertEN_case2 = $request->certEN_case2;
        $petition03->CertEN_case3 = $request->certEN_case3;
        $petition03->image=$imageName;
        $petition03->user_id = auth()->user()->id;
        $petition03->approve_id = '9';
        $petition03->petition_id = '3';
        $petition03->save();
        return redirect()->action('Student\StatusController@index');
    }

    public function destroy($id)
    {
        $petition03=Petition03::find($id);
        $exists=Storage::disk('local')->exists("public/student_image/".$petition03->Image);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists){
                  Storage::delete("public/student_image/".$petition03->Image);
            }

        Petition03::destroy($id);
        return redirect()->back();
    }
    public function show($id)
    {
        $show = Petition03::find($id);
        return view('petition/form03',['show03' => $show]);
    }
    public function download($id)
    {
        $dl = Petition03::find($id);
        return Storage::download("public/student_image/".$dl->Image);
    }

    public function registerapprove(Request $request, $id)
    {
        $request->validate([

            'idpickup' => 'required',
            'datepickup' => 'required',
            'sig_register' => 'required',
          
        ]);
        $date = date("d-m-Y"); 
        $update = Petition03::find($id);
        $update->approve_id = '11';
        $update->Dateapprove_register = $date;
        $update->Idpickup = $request->idpickup;
        $update->Datepickup = $request->datepickup;
        $update->Sig_register = $request->sig_register;
        $update->save();
        return redirect()->action('Register\HistoryController@index');
    }
    public function downloadPDF($id)
    {
        $pdfpetition = Petition03::find($id);
        
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
        
        
        $view = \View::make('student.pdf3',compact('pdfpetition'))
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
        PDF::SetTitle('สวท.03 ใบคำร้องขอหนังสือรับรองและใบรายงาน (ผู้สำเร็จการศึกษา)');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);   
        PDF::AddPage('', 'A4');
        PDF::SetFont('THSarabunNew', '', 15);
        PDF::SetY(1);
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('report.pdf');
    }
}
