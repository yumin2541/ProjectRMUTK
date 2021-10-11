<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>สวท.08</title>
    <style>

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <b><br align="right">สวท.08</b>
  <b><br align="right">ใบคำร้องขอคืนสภาพการเป็นนักศึกษา / ขอกลับเข้าศึกษา</b>
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}}
  <br><b>เรียน</b> ผู้อำนวยการสำนักงานวิชาการและงานทะเบียน
  <dd><b>ข้าพเจ้า</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}}</dd>
  <br><b>สาขา</b> {{$pdfpetition ->studentcsv->Major}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}}
  <br><b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}} <b>เข้าปีการศึกษา</b> {{$pdfpetition ->Startyear}} <b>มีความประสงค์</b>
  
  <!-- น่าจะต้องใส่ if/else ไม่แน่ใจว่าเลือกสองอันพร้อมกันได้ไหม -->
  @if($pdfpetition->Case_radio  == 'ขอคืนสภาพ')
  <dd><b>ขอคืนสภาพ</b>การเป็นนักศึกษาจาการถูกถอนชื่อออกจากการเป็นนักศึกษาเนื่องจากไม่ได้ลงทะเบียนเรียนและไม่ขอลาพักการศึกษา ในภาคการศึกษาที่ {{$pdfpetition ->Sec_case1}}  <b>ปีการศึกษา</b> {{$pdfpetition ->Year_case1}} </dd>
  @elseif($pdfpetition->Case_radio  == 'ขอกลับเข้าศึกษา')
  <dd><b>ขอกลับเข้าศึกษา</b>และลงทะเบียนในภาคเรียนที่ {{$pdfpetition ->Sec_case2}} <b>ปีการศึกษา</b> {{$pdfpetition ->Year_case2}} <b>เนื่องจาก</b>
    @if($pdfpetition->Because_case2  == 'ลาพักการศึกษา')
    <dd><b>ลาพักการศึกษา</b> ในภาคการศึกษาที่ {{$pdfpetition ->Secout_case2}} ปีการศึกษา {{$pdfpetition ->Yearout_case2}} </dd>
    @elseif($pdfpetition->Because_case2  == 'ถูกสั่งพักการศึกษา')
    <dd><b>ถูกสั่งพักการศึกษา</b> ในภาคการศึกษาที่ {{$pdfpetition ->Secout_case2}} ปีการศึกษา {{$pdfpetition ->Yearout_case2}} <b></dd>
    @endif
  </dd>
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
      <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1. อาจารย์ที่ปรึกษา</b>
      <br>
      <br align="center">{{$pdfpetition ->Advice_teacher}}
      <br>
      <br align="center">ลงนาม {{$pdfpetition ->sig_teacher}} ({{$strDaysteacher}}/{{$strMonthsteacher}}/{{$strYearsteacher}})
      <br><br>
      <b><br align="center">2. หัวหน้าสาขา</b>
      <br>
      <br align="center">{{$pdfpetition ->Advice_teacher}}
      <br>
      <br align="center">ลงนาม {{$pdfpetition ->sig_headteacher}} ({{$strDaysheadteacher}}/{{$strMonthsheadteacher}}/{{$strYearsheadteacher}})
      <br><br>
      <b><br align="center">3. คณบดี</b>
      <br>
      <br align="center">{{$pdfpetition ->Advice_dean}}
      <br>
      <br align="center">ลงนาม {{$pdfpetition ->sig_dean}} ({{$strDaysdean}}/{{$strMonthsdean}}/{{$strYearsdean}})
    </td>
    <td>
      <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. เจ้าหน้าที่กองคลัง</b>
      <br> [&nbsp; ] ค่าขอกลับเข้ามาศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 300 บาท
      <br> [&nbsp; ] ค่าคืนสภาพการเป็นนักศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 300บาท
      <br> [&nbsp; ] ค่าคืนสภาพการเป็นนักศึกษา (บัณฑิตศึกษา) 5000 บาท
      <br align="right">ใบเสร็จเล่มที่ ............................ เลขที่ ............. 
      <br align="right">จำนวนเงิน ............... บาท
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <br>
      <b>&nbsp;&nbsp;&nbsp;&nbsp;5. ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] อนุญาตให้ดำเนินการ
      <br> [&nbsp; ] ไม่อนุญาต
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <br>
      <b><br align="center">5. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] เอกสารครบตรวจสอบแล้วถูกต้อง 
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br> [&nbsp; ] คำสั่งถอนชื่อออกจากทะเบียนนักศึกษา คำสั่งที่ ......../........
      <br> [&nbsp; ] คำสั่งอนุมัติกลับเข้าศึกษา คำสั่งที่ ......../........
      <br align="right">ลงนาม ....................................... ......./......./...........
      
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>