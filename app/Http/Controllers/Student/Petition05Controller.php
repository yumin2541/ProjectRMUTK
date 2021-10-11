<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petition05;
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

class Petition05Controller extends Controller
{
    public function petition05()
    {
        $usermail = Auth::user()->email;
        $userid = Auth::user()->id;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
        return view('student/petition05')->with('users', $user)->with('usersid', $userid);
    }

    public function store(Request $request)
    {
        $request->validate([

           
            'date' => 'required',
            'dear' => 'required',
            'phone' => 'required',

            'startyear' => 'required',
            'sec' => 'required',
            'schoolyear' => 'required',

            'caseRadio' => 'required',
            'reason' => 'required',
            'file_stay' => 'required|mimes:pdf|max:5000',
          
           
            
        ]);

        $stringfileReFormat=base64_encode('_'.time());
        $ext=$request->file('file_stay')->getClientOriginalExtension();
        $fileName=$stringfileReFormat.".".$ext;
        $fileEncoded=File::get($request->file_stay);

        Storage::disk('local')->put('public/file_05/'.$fileName,$fileEncoded);

        $petition05=new Petition05;
        
 
        $petition05->Date = $request->date;
        $petition05->Dear = $request->dear;
        $id = $request->idstudent;
        $user = Studentcsv::where('IDstudent' , $id)->get();
        $data =  $user->first()->id;

        $petition05->studentcsv_id =  $data;
        $petition05->Phone = $request->phone;
        
        $petition05->Startyear = $request->startyear;
        $petition05->Sec = $request->sec;
        $petition05->Schoolyear = $request->schoolyear;
        
        $petition05->Case_radio = $request->caseRadio;
        $petition05->Numstay = $request->numstay;
        $petition05->Secstay = $request->secstay;
        $petition05->Yearstay = $request->yearstay;

        $petition05->Reason = $request->reason;
        $petition05->File_stay=$fileName;
        


        $petition05->user_id = auth()->user()->id;
        $petition05->approve_id = '1';
        $petition05->petition_id = '5';
        $petition05->Header = 'ขอลาพัก';
        $petition05->save();
        return redirect()->action('Student\StatusController@index');
    }

    public function destroy($id)
    {

        $petition05=Petition05::find($id);
        $exists=Storage::disk('local')->exists("public/file_05/".$petition05->File_stay);//เจอไฟล์ภาพชื่อเหมือนกัน
            if($exists){
                  Storage::delete("public/file_05/".$petition05->File_stay);
            }

        Petition05::destroy($id);
        return redirect()->back();
    }

    public function show($id)
    {
        $show = Petition05::find($id);
        return view('petition/form05',['show05' => $show]);
    }

    public function teacherapprove(Request $request, $id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;
        
        $date = date("d-m-Y");
        $sig_teacher = $titlename ." ". $fname ." ". $lname;
        $update = Petition05::find($id);
        
        $update->Sig_teacher = $sig_teacher;
        $update->approve_id = '2';
        $update->Dateapprove_teacher = $date;
       
        $update->save();
        return redirect()->action('Teacher\HistoryController@index');
    }
    public function headteacherapprove(Request $request, $id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;
        
        $date = date("d-m-Y");
        $sig_headteacher = $titlename ." ". $fname ." ". $lname;
        $update = Petition05::find($id);
        
        $update->Sig_headteacher = $sig_headteacher;
        $update->approve_id = '3';
        $update->Dateapprove_headteacher = $date;
       
        $update->save();
        return redirect()->action('Headteacher\HistoryController@index');
    }
    public function deanapprove(Request $request, $id)
    {
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;
        
        $date = date("d-m-Y");
        $sig_dean = $titlename ." ". $fname ." ". $lname;
        $update = Petition05::find($id);
        
        $update->Sig_dean = $sig_dean;
        $update->approve_id = '8';
        $update->Dateapprove_dean = $date;
       
        $update->save();
        return redirect()->action('Dean\HistoryController@index');
    }

    public function downloadPDF($id)
    {
        $pdfpetition = Petition05::find($id);
        
        $strDate = $pdfpetition->Date; 
        $strDate_teacher = $pdfpetition->Dateapprove_teacher; 
        $strDate_headteacher = $pdfpetition->Dateapprove_headteacher; 
        $strDate_dean = $pdfpetition->Dateapprove_dean; 


		$strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strMonth2= date("m",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));

        $strYear_teacher = date("Y",strtotime($strDate_teacher))+543;
        $strMonth_teacher= date("m",strtotime($strDate_teacher));
        $strDay_teacher= date("j",strtotime($strDate_teacher));

        $strYear_headteacher = date("Y",strtotime($strDate_headteacher))+543;
        $strMonth_headteacher = date("m",strtotime($strDate_headteacher));
        $strDay_headteacher = date("j",strtotime($strDate_headteacher));

        $strYear_dean = date("Y",strtotime($strDate_dean))+543;
        $strMonth_dean= date("m",strtotime($strDate_dean));
        $strDay_dean= date("j",strtotime($strDate_dean));
        

		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม ","พฤศจิกายน","ธันวาคม");
        $strMonthThai=$strMonthCut[$strMonth];
        
        
        $view = \View::make('student.pdf5',compact('pdfpetition'))
            ->with('strYearsteacher', $strYear_teacher) 
            ->with('strMonthsteacher', $strMonth_teacher) 
            ->with('strDaysteacher', $strDay_teacher) 

            ->with('strYearsheadteacher', $strYear_headteacher) 
            ->with('strMonthsheadteacher', $strMonth_headteacher) 
            ->with('strDaysheadteacher', $strDay_headteacher) 

            ->with('strYearsdean', $strYear_dean) 
            ->with('strMonthsdean', $strMonth_dean) 
            ->with('strDaysdean', $strDay_dean) 

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
        PDF::SetTitle('สวท.05 ใบคำร้องขอลาพัก');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);   
        PDF::AddPage('', 'A4');
        PDF::SetFont('THSarabunNew', '', 14);
        PDF::SetY(1);
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('report.pdf');
    }
}
