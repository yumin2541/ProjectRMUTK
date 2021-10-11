<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>สวท.06</title>
    <style>

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <b><br align="right">สวท.06</b>
  <b><br align="right">คำร้องขอรักษาสภาพ</b>
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}}
  <br><b>เรียน</b> ผู้อำนวยการสำนักงานวิชาการและงานทะเบียน
  <dd><b>ข้าพเจ้า</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}}</dd>
  <br><b>สาขา</b> {{$pdfpetition ->studentcsv->Major}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}}
  <br><b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}} <b>เข้าปีการศึกษา</b> {{$pdfpetition ->Startyear}} <b>มีความประสงค์</b>
  <!-- น่าจะต้องใส่ if/else  ว่าจะขึ้น นักศึกษาตกค้าง หรือ นักศึกษาผลการเรียนไม่สมบูรณ์ I -->

  @if($pdfpetition->Case_radio  == 'นักศึกษาตกค้าง')
  <dd><b>ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาตกค้าง) ในภาคการศึกษาที่</b> {{$pdfpetition ->Sec}} <b>ปีการศึกษา</b> {{$pdfpetition ->Startyear_case}}</dd>
  <dd><b>เนื่องจาก</b> {{$pdfpetition ->Because}}</dd>
  @elseif($pdfpetition->Case_radio  == 'นักศึกษาผลการเรียนไม่สมบูรณ์')
  <dd><b>ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาผลการเรียนไม่สมบูรณ์ I ) ในภาคการศึกษาที่</b> {{$pdfpetition ->Sec}} <b>ปีการศึกษา</b> {{$pdfpetition ->Startyear_case}}</dd>
  <dd><b>เนื่องจาก</b> {{$pdfpetition ->Because}}</dd>

  @endif

  
  <br>
  <dd><b>จึงเรียนมาเพื่อโปรดพิจารณา</b></dd>
  <b><br align="right">ขอแสดงความนับถือ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
  <b><br align="right">ลงชื่อนักศึกษา</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><br align="right">หมายเลขโทรศัพท์ติดต่อ</b> {{$pdfpetition ->Phone}} &nbsp;&nbsp;&nbsp;&nbsp;
  <br>
  <hr>
  <table cellpadding="15">
  <tr>
    <td>
      <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. อาจารย์ที่ปรึกษา / หัวหน้าสาขา</b>
      <br align="center"> {{$pdfpetition ->Advice_teacher}}
      <br align="left">ลงนาม {{$pdfpetition ->Sig_teacher}} ({{$strDaysteacher}}/{{$strMonthsteacher}}/{{$strYearsteacher}})
      <br align="center">( อาจารย์ที่ปรึกษา )
  
      <br align="left">ลงนาม {{$pdfpetition ->Sig_headteacher}} ({{$strDaysheadteacher}}/{{$strMonthsheadteacher}}/{{$strYearsheadteacher}})
      <br align="center">( หัวหน้าสาขา )
      <br>
      <b><br  align="center">2. คณบดี</b>
      <br> [<b>x</b>] อนุญาตให้ดำเนินการลาพักการศึกษา
      <br> [ ] ไม่อนุญาต
      <br align="left">ลงนาม {{$pdfpetition ->Sig_dean}} ({{$strDaysdean}}/{{$strMonthsdean}}/{{$strYearsdean}})
      <br>
      <!-- คิดเงินน่าจะไม่ต้องทำ -->
      <b><br align="center">3. เจ้าหน้าที่กองคลัง</b>
      <br> [&nbsp; ] ค่ารักษาสภาพการเป็นนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 300 บาท
      <br> [&nbsp; ] ค่ารักษาสภาพการเป็นนักศึกษา (บัณฑิตศึกษา) 3000 บาท
      <br> [&nbsp; ] ไม่มีหนี้สิน  [&nbsp; ] มีหนี้สินกับทางมหาวิทยาลัย &nbsp;&nbsp; .........บาท
      <br align="right">ใบเสร็จเล่มที่ ............................ เลขที่ ............. 
      <br align="right">จำนวนเงิน ............... บาท
      <br align="right">ลงนาม................................... &nbsp;&nbsp; ......./......./...........
      
    </td>
    <td>
      <b>&nbsp;&nbsp;&nbsp;&nbsp;4. ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] อนุญาตให้ดำเนินการลาพักการศึกษา
      <br> [&nbsp; ] ไม่อนุญาต
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <br>
      <b><br align="center">5. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] เอกสารครบตรวจสอบแล้วถูกต้อง 
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br>
      <br> [&nbsp; ] รายวิชาที่นักศึกษาติดระดับคะแนน ม.ส. (I)
      <br> ....................... &nbsp;&nbsp; ................................................................
      <br> ....................... &nbsp;&nbsp; ................................................................
      <br>
      <br> [&nbsp; ] ดำเนินการแล้ว .......................................
      <br align="right">ลงนาม ....................................... ......./......./...........
      
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>