<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>

  <body >
  
  <br align="right">สวท.02
  <br align="right">คำร้องขอหนังสือรับรอง / ใบรายงานผลการศึกษา
  <br align="right">(สำหรับนักศึกษาปัจจุบัน)
  <hr>
  </br>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}} 
  <br><b>เรื่อง</b> ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน 
  <dd><b>ข้าพเจ้า</b> &nbsp;&nbsp;&nbsp; {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}}</dd>
  <br><b>ชื่อ-สกุล ภาษาอังกฤษ</b> &nbsp;&nbsp;&nbsp; {{$pdfpetition ->studentcsv->Titlename_eng}} {{$pdfpetition ->studentcsv->Fname_eng}} {{$pdfpetition ->studentcsv->Lname_eng}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สาขา</b> {{$pdfpetition ->studentcsv->Major}}
  <br><b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}} &nbsp;&nbsp;&nbsp; 
  <!-- น่าจะต้องใส่ if/else -->
  <dd> <b>มีความประสงค์</b> </dd>
  @if($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง')
  <dd> <b>ขอหนังสือรับรอง</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case1}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case1}} ชุด</dd>
  <dd> <b>สถานะภาพ</b>  {{$pdfpetition ->Status_case1}} </dd> 
  <dd> <b>เพื่อ</b>  {{$pdfpetition ->For_case1}} </dd>
  @elseif($pdfpetition->Case_radio  == 'ขอใบรายงานผลการศึกษา')
  <dd> <b>ขอใบรายงานผลการศึกษา</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case2}} &nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case2}}</dd>
  <dd> <b>เพื่อ</b>  {{$pdfpetition ->For_case2}} </dd>
  @else
  <dd> <b>ขอหนังสือรับรอง</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case1}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case1}} ชุด</dd>
  <dd> <b>สถานะภาพ</b>  {{$pdfpetition ->Status_case1}} </dd> 
  <dd> <b>เพื่อ</b>  {{$pdfpetition ->For_case1}} </dd>
  <dd> <b>ขอใบรายงานผลการศึกษา</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case2}} &nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case2}}</dd>
  <dd> <b>เพื่อ</b>  {{$pdfpetition ->For_case2}} </dd>
  @endif
  <br>

  <b><br align="right">ลงชื่อนักศึกษา</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><br align="right">หมายเลขโทรศัพท์ติดต่อ</b> {{$pdfpetition ->Phone}} &nbsp;&nbsp;&nbsp;&nbsp;
  <br>
  <hr>
  <table cellpadding="15">
  <tr>
    <td>
      <br><b>1. เจ้าหน้าที่การเงิน</b>
      @if($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง')
      <br> [<b>x</b>] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1}} ชุด ชุดละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50}} บาท
      <br> [ ] ค่าใบรายงานผลการศึกษา &nbsp; - &nbsp;ชุด ชุดละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      @elseif($pdfpetition->Case_radio  == 'ขอใบรายงานผลการศึกษา')
      <br> [ ] ค่าหนังสือรับรอง&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ชุดละ 50 บาท  
      <br align="right">เป็นเงิน &nbsp; - &nbsp;บาท
      <br> [<b>x</b>] ค่าใบรายงานผลการศึกษา &nbsp; {{$pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2}} ชุด ชุดละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50}} บาท
      @else
      <br> [<b>x</b>] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1}} ชุด ชุดละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50}} บาท
      <br> [<b>x</b>] ค่าใบรายงานผลการศึกษา &nbsp; {{$pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2}} ชุด ชุดละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50}} บาท
      @endif
      <br align="right">รวมเป็นเงิน&nbsp; {{(($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50)+(($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50)}} &nbsp;บาท
      <br><br><br><br><br><br>
      <br align="right">ใบเสร็จเล่มที่ ............................ เลขที่ .............
      <br align="right">ลงนาม .......................................... /.......... /...........
      
    </td>
    <td>
      <br><b>2. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [<b>x</b>] เอกสารครบตรวจสอบแล้วถูกต้อง
      <br> &nbsp;&nbsp;&nbsp;&nbsp;เลขที่รับเอกสาร <b>{{$pdfpetition ->Idpickup}}</b>
      <br> &nbsp;&nbsp;&nbsp;&nbsp;นัดรับเอกสารวันที่ <b>{{$pdfpetition ->Datepickup}}</b>
      <br>
      <br align="right"> <b>ลงนาม</b> {{$pdfpetition ->Sig_register}}  ({{$strDaysregister}}/{{$strMonthsregister}}/{{$strYearsregister}})
      <br><br><br>
      <br>3. นักศึกษา
      <br> ลงนามนักศึกษา..........................................
      <br>
      <br> รับเอกสารวันที่.......... /.......... /.......... เวลา .............
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>