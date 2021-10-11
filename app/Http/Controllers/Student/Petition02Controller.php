<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Petition02;
use App\Petitionall;
use App\Studentcsv;
use App\User;
use App\Approve;
use PDF;
use PDF2;
use DateTimeZone;
use Jenssegers\Date\Date;

class Petition02Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student/createpetition');
    }
    public function petition02()
    {
        $usermail = Auth::user()->email;
        $userid = Auth::user()->id;
        $user = Studentcsv::where('Mail' , $usermail)->get();
    
        return view('student/petition02')->with('users', $user)->with('usersid', $userid);
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

        $petition02=new Petition02;
        
 
        $petition02->Date = $request->date;
        $petition02->Dear = $request->dear;

        $id = $request->idstudent;
        $user = Studentcsv::where('IDstudent' , $id)->get();
        $data =  $user->first()->id;

        $petition02->studentcsv_id =  $data;

        $petition02->Phone = $request->phone;
        $petition02->Case_radio = implode(',', $request->caseRadio);
        $petition02->Status_case1 = $request->status_case1;
        $petition02->For_case1 = $request->for_case1;
        $petition02->CertTH_case1 = $request->certTH_case1;
        $petition02->CertEN_case1 = $request->certEN_case1;
        $petition02->For_case2 = $request->for_case2;
        $petition02->CertTH_case2 = $request->certTH_case2;
        $petition02->CertEN_case2 = $request->certEN_case2;
        $petition02->user_id = auth()->user()->id;
        $petition02->approve_id = '9';
        $petition02->petition_id = '2';
        $petition02->save();
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
        $show = Petition02::find($id);
        return view('petition/form02',['show02' => $show]);
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
        Petition02::find($id)->delete();
        return redirect()->back();
    }

    public function registerapprove(Request $request, $id)
    {
        $request->validate([

            'idpickup' => 'required',
            'datepickup' => 'required',
            'sig_register' => 'required',
          
        ]);
        $date = date("d-m-Y");
        $update = Petition02::find($id);
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
        $pdfpetition = Petition02::find($id);
        
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
        
        
        $view = \View::make('student.pdf2',compact('pdfpetition'))
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
        PDF::SetTitle('สวท.02 ใบคำร้องขอหนังสือรับรองและใบรายงานผลการศึกษา (นักศึกษาปัจจุบัน)');
        PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);   
        PDF::AddPage('', 'A4');
        PDF::SetFont('THSarabunNew', '', 15,'false');
        PDF::SetY(1);
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('report.pdf');
    }
    
    
   
}

