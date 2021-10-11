<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Petition01;
use App\Petition02;
use App\Petitionall;
use App\Studentcsv;
use App\User;
use App\Approve;
use PDF;
use PDF2;
use App\Http\Middleware\VerifyUser;

class PetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('verifyUser')->only(['index']);
    }

    public function index()
    {
        return view('student/createpetition');
    }

    public function petition01()
    {
        $usermail = Auth::user()->email;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
        return view('student/petition01')->with('users', $user);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'date' => 'required',
            'dear' => 'required',
            'header' => 'required',
            'idstudent' => 'required',
            'phone' => 'required',
            'body' => 'required'
            
        ]);

        $petition01=new Petition01;
        
        $petition01->Date = $request->date;
        $petition01->Dear = $request->dear;
        $petition01->Header = $request->header;

        $id = $request->idstudent;
        $user = Studentcsv::where('IDstudent' , $id)->get();
        $data =  $user->first()->id;

        $petition01->studentcsv_id =  $data;
        $petition01->Phone = $request->phone;
        $petition01->Body = $request->body;
        $petition01->user_id = auth()->user()->id;
        $petition01->approve_id = '1';
        $petition01->petition_id = '1';
        $petition01->save();
        return redirect()->action('Student\StatusController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Petition01::find($id);
        return view('petition/form01',['show01' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petition01::find($id)->delete();
        return redirect()->back();
    }

    public function teacherapprove(Request $request, $id)
    {
        $request->validate([

            'advice_teacher' => 'required',
            'sige_teacher' => 'required',
            
        ]);
        
        $date = date("d-m-Y");
        $update = Petition01::find($id);
        $update->approve_id = '2';
        $update->Dateapprove_teacher = $date;
        $update->Advice_teacher = $request->advice_teacher;
        $update->sig_teacher = $request->sige_teacher;
        $update->save();
        return redirect()->action('Teacher\HistoryController@index');
    }
    public function headteacherapprove(Request $request, $id)
    {
        $request->validate([

            'advice_headteacher' => 'required',
            'sige_headteacher' => 'required',
            
        ]);
        $date = date("d-m-Y");
        $update = Petition01::find($id);
        $update->approve_id = '3';
        $update->Dateapprove_headteacher = $date;
        $update->Advice_headteacher = $request->advice_headteacher;
        $update->sig_headteacher = $request->sige_headteacher;
        $update->save();
        return redirect()->action('Headteacher\HistoryController@index');
    }
    public function deanapprove(Request $request, $id)
    {
        $request->validate([

            'advice_dean' => 'required',
            'sige_dean' => 'required',
            
        ]);
        $date = date("d-m-Y");
        $update = Petition01::find($id);
        $update->approve_id = '8';
        $update->Dateapprove_dean = $date;
        $update->Advice_dean = $request->advice_dean;
        $update->sig_dean = $request->sige_dean;
        $update->save();
        return redirect()->action('Dean\HistoryController@index');
    }

    public function downloadPDF($id)
    {
        $pdfpetition = Petition01::find($id);
        
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
        
        
        $view = \View::make('student.pdf',compact('pdfpetition'))
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
        PDF::SetTitle('สวท.01 ใบคำร้องทั่วไป');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);   
        PDF::AddPage('', 'A4');
        PDF::SetFont('THSarabunNew', '', 15);
        PDF::SetY(1);
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('report.pdf');
    }
    public function downloadPDF2()
    {
       
     
     
    }
            
}
