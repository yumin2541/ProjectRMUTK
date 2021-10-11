<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petition08;
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

class Petition08Controller extends Controller
{
    public function petition08()
    {
        $usermail = Auth::user()->email;
        $userid = Auth::user()->id;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
        return view('student/petition08')->with('users', $user)->with('usersid', $userid);
    }
    public function store(Request $request)
    {
        $request->validate([

           
            'date' => 'required',
            'dear' => 'required',
      
            'phone' => 'required',
            'startyear' => 'required',
            'caseRadio' => 'required',
         
        ]);

       
        $petition08=new Petition08;
        
 
        $petition08->Date = $request->date;
        $petition08->Dear = $request->dear;
        $id = $request->idstudent;
        $user = Studentcsv::where('IDstudent' , $id)->get();
        $data =  $user->first()->id;

        $petition08->studentcsv_id =  $data;
        $petition08->Phone = $request->phone;
        $petition08->Startyear = $request->startyear;
        $petition08->Case_radio = $request->caseRadio;
        
        $petition08->Sec_case1 = $request->sec_case1;
        $petition08->Year_case1 = $request->year_case1;

        $petition08->Because_case2 = $request->because_case2;
        $petition08->Sec_case2 = $request->sec_case2;
        $petition08->Year_case2 = $request->year_case2;
        $petition08->Secout_case2 = $request->secout_case2;
        $petition08->Yearout_case2 = $request->yearout_case2;
        

        $petition08->user_id = auth()->user()->id;
        $petition08->approve_id = '1';
        $petition08->petition_id = '8';
        $petition08->save();
        return redirect()->action('Student\StatusController@index');
    }
    public function show($id)
    {
        $show = Petition08::find($id);
        return view('petition/form08',['show08' => $show]);
    }
    public function destroy($id)
    {
        Petition08::find($id)->delete();
        return redirect()->back();
    }
    public function teacherapprove(Request $request, $id)
    {
        $request->validate([

            'advice_teacher' => 'required',
            
            
        ]);
        
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;
        
        $date = date("d-m-Y");
        $sig_teacher = $titlename ." ". $fname ." ". $lname;
        $update = Petition08::find($id);
        
        $update->Sig_teacher = $sig_teacher;
        $update->Advice_teacher = $request->advice_teacher;
        $update->approve_id = '2';
        $update->Dateapprove_teacher = $date;
       
        $update->save();
        return redirect()->action('Teacher\HistoryController@index');
    }
    public function headteacherapprove(Request $request, $id)
    {
        $request->validate([

            'advice_headteacher' => 'required',
            
            
        ]);
        
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;
        
        $date = date("d-m-Y");
        $sig_headteacher = $titlename ." ". $fname ." ". $lname;
        $update = Petition08::find($id);
        
        $update->Sig_headteacher = $sig_headteacher;
        $update->Advice_headteacher = $request->advice_headteacher;
        $update->approve_id = '3';
        $update->Dateapprove_headteacher = $date;
       
        $update->save();
        return redirect()->action('Headteacher\HistoryController@index');
    }
    public function deanapprove(Request $request, $id)
    {
        $request->validate([

            'advice_dean' => 'required',
            
            
        ]);
        
        $usermail = Auth::user()->email;
        $user = Allcsv::where('Mail' , $usermail);
        $titlename = $user->first()->Titlename;
        $fname = $user->first()->Fname;
        $lname = $user->first()->Lname;
        
        $date = date("d-m-Y");
        $sig_dean = $titlename ." ". $fname ." ". $lname;
        $update = Petition08::find($id);
        
        $update->Sig_dean = $sig_dean;
        $update->Advice_dean = $request->advice_dean;
        $update->approve_id = '8';
        $update->Dateapprove_dean = $date;
       
        $update->save();
        return redirect()->action('Dean\HistoryController@index');
    }
    public function downloadPDF($id)
    {
        $pdfpetition = Petition08::find($id);
        
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
        
        
        $view = \View::make('student.pdf8',compact('pdfpetition'))
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
        PDF::SetTitle('สวท.08 ใบคำร้องขอคืนสภาพ / กลับเข้าศึกษา');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);   
        PDF::AddPage('', 'A4');
        PDF::SetFont('THSarabunNew', '', 14);
        PDF::SetY(1);
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('report.pdf');
    }
}
