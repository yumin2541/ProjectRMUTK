<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>สวท.07</title>
    <style>

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <b><br align="right">สวท.07</b>
  <b><br align="right">คำร้องขอลาออก</b>
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}}
  <br><b>เรียน</b> ผู้อำนวยการสำนักงานวิชาการและงานทะเบียน
  <dd><b>ข้าพเจ้า</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}}</dd>
  <br><b>สาขา</b> {{$pdfpetition ->studentcsv->Major}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}}
  <br><b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}} <b>เข้าปีการศึกษา</b> {{$pdfpetition ->Startyear}} <b>มีความประสงค์</b>
  <dd><b>ขอลาออกจากการเป็นนักศึกษาในภาคเรียนที่</b> {{$pdfpetition ->Sec}} <b>ปีการศึกษา</b> {{$pdfpetition ->Year}} (นักศึกษาต้องไม่มีหนี้สินกับทางมหาวิทยาลัย)</dd>
  <dd><b>เนื่องจาก</b> {{$pdfpetition ->Because}}</dd>
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
      <b><br align="center">3. เจ้าหน้าสำนักวิทยบริการและเทคโนโลยีสารสนเทศ</b>
      <br> [&nbsp; ] ค้างส่งหนังสือ
      <br> [&nbsp; ] ไม่ค้างส่งหนังสือ
      <br> [&nbsp; ] อื่นๆ ........................................................................
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <!-- คิดเงินน่าจะไม่ต้องทำ -->
      
      
    </td>
    <td>
      <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. เจ้าหน้าที่กองคลัง</b>
      <br> [&nbsp; ] ไม่มีหนี้สิน 
      <br> [&nbsp; ] มีหนี้สินกับทางมหาวิทยาลัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ............บาท
      <br align="right">ใบเสร็จเล่มที่ ............................ เลขที่ ............. 
      <br align="right">จำนวนเงิน ............... บาท
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <br>
      <b><br align="center">5. ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] อนุญาตให้ดำเนินการลาพักการศึกษา
      <br> [&nbsp; ] ไม่อนุญาต
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <br>
      <b><br align="center">6. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] เอกสารครบตรวจสอบแล้วถูกต้อง 
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br> [&nbsp; ] ดำเนินการบันทึกสถานะ
      <br align="right">ลงนาม ....................................... ......./......./...........
      
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>