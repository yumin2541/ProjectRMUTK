<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>สวท.05</title>
    <style>

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <b><br align="right">สวท.05</b>
  <b><br align="right">คำร้องขอลาพักการศึกษา</b>
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}}
  <br><b>เรียน</b> ผู้อำนวยการสำนักงานวิชาการและงานทะเบียน
  <dd><b>ข้าพเจ้า</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}}
  <br><b>สาขา</b> {{$pdfpetition ->studentcsv->Major}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}}
  <br><b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}} <b>เข้าปีการศึกษา</b> {{$pdfpetition ->Startyear}} <b>มีความประสงค์ขอลาพักการศึกษาในภาคเรียนที่</b> {{$pdfpetition ->Sec}} <b>ปีการศึกษา</b> {{$pdfpetition ->Schoolyear}}
  <!-- น่าจะต้องใส่ if/else -->

  @if($pdfpetition->Case_radio  == 'ครั้งแรก')
  <dd><b>ครั้งแรก</b></dd>
  @elseif($pdfpetition->Case_radio  == 'มากกว่า1ครั้ง')
  <dd><b>ครั้งที่</b> {{$pdfpetition ->Numstay}} <b>โดยครั้งก่อนลาพักในภาคเรียนที่</b> {{$pdfpetition ->Secstay}} <b>ปีการศึกษา</b> {{$pdfpetition ->Yearstay}}</dd>
  @elseif($pdfpetition->Case_radio  == 'ลาพักการศึกษาเกินกว่า 2 ภาคการศึกษาปกติติดต่อกัน')
  <dd><b>ลาพักการศึกษามากกว่า 2 ภาคการศึกษาปกติติดต่อกัน</b></dd>
  @endif
  
  <!-- หน้ากรอกฟอร์มก่อนกรอก เหตุผล ให้มี *ตัวแดง เตือนว่า " นักศึกษาที่ลาพักการศึกษาต้องทำคำร้องขอกลับเข้าศึกษาในภาคการศึกษาถัดไป " -->
  <dd><b>เหตุผล</b> {{$pdfpetition ->Reason}}</dd>
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
      <br> [<b>x</b>] อนุญาตให้ดำเนินการลาพักการศึกษา
      <br> [ ] ไม่อนุญาต
      <br align="left">ลงนาม {{$pdfpetition ->Sig_teacher}} ({{$strDaysteacher}}/{{$strMonthsteacher}}/{{$strYearsteacher}})
      <br align="center">( อาจารย์ที่ปรึกษา )
      <br>
      <br> [<b>x</b>] อนุญาตให้ดำเนินการลาพักการศึกษา
      <br> [ ] ไม่อนุญาต
      <br align="left">ลงนาม {{$pdfpetition ->Sig_headteacher}} ({{$strDaysheadteacher}}/{{$strMonthsheadteacher}}/{{$strYearsheadteacher}})
      <br align="center">( หัวหน้าสาขา )
      <br>
      <b><br  align="center">2. คณบดี</b>
      <br> [<b>x</b>] อนุญาตให้ดำเนินการลาพักการศึกษา
      <br> [ ] ไม่อนุญาต
      <br align="left">ลงนาม {{$pdfpetition ->Sig_dean}} ({{$strDaysdean}}/{{$strMonthsdean}}/{{$strYearsdean}})
      <br>
      <b><br align="center">3. เจ้าหน้าที่กองคลัง</b>
      <br> [&nbsp; ] ค่ารักษาสภาพการเป็นนักศึกษา(ลาพักการศึกษา)  300 บาท
      <br> [&nbsp; ] ไม่มีหนี้สิน  [&nbsp; ] มีหนี้สินกับทางมหาวิทยาลัย &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; .........บาท
      <br align="right">ลงนาม................................... &nbsp;&nbsp; ......./......./...........
      
    </td>
    <td>
      <b>&nbsp;&nbsp;&nbsp;&nbsp;4. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br> [&nbsp; ] เอกสารครบตรวจสอบแล้วถูกต้อง 
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br> [&nbsp; ] ลาพักการศึกษาไม่เกินสองภาคการศึกษาติดต่อกัน
      <br> [&nbsp; ] นักศึกษาชั้นปีที่..../ตกค้าง 
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br> [&nbsp; ] ยกเลิกการลงทะเบียนเรียน [&nbsp; ] ถอนรายวิชาติด W 
      <br> [&nbsp; ] ถอนรายวิชาไม่ติด
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br> [&nbsp; ] ดำเนินการแล้ว 
      <br align="right">ลงนาม ....................................... ......./......./...........
      <br>
      <b><br align="center">5. หัวหน้าสำนักงานเลขานุการ สวท./หัวหน้างานบริหาร</b>
      <br>....................................................................................................................................................................................
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
      <br>
      <b><br align="center">6. ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br>....................................................................................................................................................................................
      <br align="center">ลงนาม.....................................................
      <br align="right">(......................................) ......./......./...........
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>