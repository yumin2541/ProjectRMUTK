<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>สวท.01</title>
    <style>

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <br align="right">สวท.03
  <br align="right">คำร้องขอหนังสือรับรอง / ใบรายงานผลการศึกษา / ใบแทนปริญญาบัตร
  <br align="right">(สำหรับผู้สำเร็จการศึกษา)
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}} 
  <br><b>เรื่อง</b> ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน 
  <dd><b>ข้าพเจ้า</b> &nbsp;&nbsp;&nbsp; {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}}</dd>
  <br><b>ชื่อ-สกุล ภาษาอังกฤษ</b> &nbsp;&nbsp;&nbsp; {{$pdfpetition ->studentcsv->Titlename_eng}} {{$pdfpetition ->studentcsv->Fname_eng}} {{$pdfpetition ->studentcsv->Lname_eng}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สาขา</b> {{$pdfpetition ->studentcsv->Major}}
  <br><b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}} &nbsp;&nbsp;&nbsp; 
  <br><b>ระดับปริญญา</b> {{$pdfpetition ->Degree}} &nbsp;&nbsp;&nbsp;&nbsp; <b>ระดับประกาศนียบัตร</b> {{$pdfpetition ->Cert}}

  <!-- น่าจะต้องใส่ if/else -->
  <dd> <b>มีความประสงค์</b> </dd>
    @if($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง')
  <dd> ขอหนังสือรับรอง :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case1}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case1}} ชุด</dd>
    @elseif($pdfpetition->Case_radio  == 'ขอใบรายงานผลการศึกษา')
  <dd> ขอใบรายงานผลการศึกษา:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case2}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case2}} ชุด</dd>
    @elseif($pdfpetition->Case_radio  == 'ขอใบแทนปริญญาบัตร')
  <dd>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบแทนปริญญาบัตร:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case3}} ชุด</dd>
  @elseif($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง,ขอใบรายงานผลการศึกษา')
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอหนังสือรับรอง :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case1}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case1}} ชุด</dd>
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบรายงานผลการศึกษา:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case2}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case2}} ชุด</dd>
  @elseif($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง,ขอใบแทนปริญญาบัตร') 
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอหนังสือรับรอง :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case1}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case1}} ชุด</dd>
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบแทนปริญญาบัตร:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case3}} ชุด</dd>
  @elseif($pdfpetition->Case_radio  == 'ขอใบรายงานผลการศึกษา,ขอใบแทนปริญญาบัตร') 
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบรายงานผลการศึกษา:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case2}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case2}} ชุด</dd>
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบแทนปริญญาบัตร:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case3}} ชุด</dd>
  @else
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอหนังสือรับรอง :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case1}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case1}} ชุด</dd>
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบรายงานผลการศึกษา:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาไทย จำนวน {{$pdfpetition ->CertTH_case2}} ชุด&nbsp;&nbsp;&nbsp; ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case2}} ชุด</dd>
  <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ขอใบแทนปริญญาบัตร:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาษาอังกฤษ จำนวน {{$pdfpetition ->CertEN_case3}} ชุด</dd>
  @endif
  <br><br>

  
  <b><br align="right">ลงชื่อนักศึกษา</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><br align="right">หมายเลขโทรศัพท์ติดต่อ</b> {{$pdfpetition ->Phone}} &nbsp;&nbsp;&nbsp;&nbsp;
  <br>
  <hr>
  <table cellpadding="15">
  <tr>
    <td>
      <br><b>1. เจ้าหน้าที่การเงิน</b>
      @if($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง')
      <br> [<b>x</b>] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50}} บาท
      <br> [ ] ค่าใบรายงานผลการศึกษา &nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      <br> [ ] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      @elseif($pdfpetition->Case_radio  == 'ขอใบรายงานผลการศึกษา')
      <br> [ ] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      <br> [<b>x</b>] ค่าใบรายงานผลการศึกษา {{$pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50}} บาท
      <br> [ ] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      @elseif($pdfpetition->Case_radio  == 'ขอใบแทนปริญญาบัตร')
      <br> [ ] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน - บาท
      <br> [ ] ค่าใบรายงานผลการศึกษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน - บาท
      <br> [<b>x</b>] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$pdfpetition ->CertEN_case3}} ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน {{$pdfpetition ->CertEN_case3 *500}} บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน - บาท
      @elseif($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง,ขอใบรายงานผลการศึกษา')
      <br> [<b>x</b>] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50}} บาท
      <br> [<b>x</b>] ค่าใบรายงานผลการศึกษา {{$pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50}} บาท
      <br> [ ] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      @elseif($pdfpetition->Case_radio  == 'ขอหนังสือรับรอง,ขอใบแทนปริญญาบัตร') 
      <br> [<b>x</b>] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50}} บาท
      <br> [ ] ค่าใบรายงานผลการศึกษา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน - บาท
      <br> [<b>x</b>] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$pdfpetition ->CertEN_case3}} ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน {{$pdfpetition ->CertEN_case3 *500}} บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน - บาท
      @elseif($pdfpetition->Case_radio  == 'ขอใบรายงานผลการศึกษา,ขอใบแทนปริญญาบัตร')
      <br> [ ] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      <br> [<b>x</b>] ค่าใบรายงานผลการศึกษา {{$pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50}} บาท
      <br> [<b>x</b>] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$pdfpetition ->CertEN_case3}} ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน {{$pdfpetition ->CertEN_case3 *500}} บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      @else
      <br> [<b>x</b>] ค่าหนังสือรับรอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50}} บาท
      <br> [<b>x</b>] ค่าใบรายงานผลการศึกษา &nbsp;&nbsp;{{$pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2}} ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน {{($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50}} บาท
      <br> [<b>x</b>] ค่าใบแทนปริญญาบัตร &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$pdfpetition ->CertEN_case3}} ชุด ๆ ละ 500 บาท 
      <br align="right">เป็นเงิน {{$pdfpetition ->CertEN_case3 *500}} บาท
      <br> [ ] ค่าอื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;ชุด ๆ ละ 50 บาท 
      <br align="right">เป็นเงิน&nbsp; - &nbsp;บาท
      @endif
      <br align="right">รวมเป็นเงิน&nbsp; {{(($pdfpetition ->CertTH_case1 + $pdfpetition ->CertEN_case1)*50)+(($pdfpetition ->CertTH_case2 + $pdfpetition ->CertEN_case2)*50)+($pdfpetition ->CertEN_case3*500)}} &nbsp;บาท
      <br align="right">ใบเสร็จเล่มที่ ............................ เลขที่ .............
      <br align="right">ลงนาม ................................... .......... /.......... /...........
     
      
  

    </td>
    <td>
      <br><b>2. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [<b>x</b>] เอกสารครบตรวจสอบแล้วถูกต้อง
      <br> &nbsp;&nbsp;&nbsp;&nbsp;เลขที่รับเอกสาร <b>{{$pdfpetition ->Idpickup}}</b>
      <br> &nbsp;&nbsp;&nbsp;&nbsp;นัดรับเอกสารวันที่ <b>{{$pdfpetition ->Datepickup}}</b>
      <br>
      <b><br align="right">ลงนาม</b> {{$pdfpetition ->Sig_register}} ({{$strDaysregister}}/{{$strMonthsregister}}/{{$strYearsregister}})
      <br>
      <br><b>3. นักศึกษา</b>
      <br> ลงนามนักศึกษา..........................................
      <br>
      <br> รับเอกสารวันที่.......... /.......... /.......... เวลา .............
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>