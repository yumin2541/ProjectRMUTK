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
  <br align="right">สวท.01
  <br align="right">คำร้องทั่วไป
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}} 
  <br><b>เรื่อง</b>  {{$pdfpetition ->Header}}
  <br><b>เรียน</b> {{$pdfpetition ->Dear}}
  <dd><b>ข้าพเจ้า</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}}</dd>
  <br><b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สาขา</b> {{$pdfpetition ->studentcsv->Major}}
  <br><b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}}
  <br><b>มีความประสงค์</b> {{$pdfpetition ->Body}}
  <br>
  <dd>จึงเรียนมาเพื่อโปรดพิจารณา</dd>
  <br align="right">ขอแสดงความนับถือ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><br align="right">ลงชื่อนักศึกษา</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><br align="right">หมายเลขโทรศัพท์ติดต่อ</b> {{$pdfpetition ->Phone}} &nbsp;&nbsp;&nbsp;&nbsp;
  <br>
  <hr>
  <table cellpadding="15">
  <tr>
    <td>
    <b><br align="center">1. อาจารย์ที่ปรึกษา</b>
      <br align="center">{{$pdfpetition ->Advice_teacher}}
      <br>
      <br align="center">ลงนาม {{$pdfpetition ->sig_teacher}} ({{$strDaysteacher}}/{{$strMonthsteacher}}/{{$strYearsteacher}})
      <br><br>
      <b><br align="center">2. หัวหน้าสาขา</b>
      <br align="center">{{$pdfpetition ->Advice_teacher}}
      <br>
      <br align="center">ลงนาม {{$pdfpetition ->sig_headteacher}} ({{$strDaysheadteacher}}/{{$strMonthsheadteacher}}/{{$strYearsheadteacher}})
      <br><br>
      
      <b><br align="center">3. คณบดี</b>
      <br align="center">{{$pdfpetition ->Advice_dean}}
      <br>
      <br align="center">ลงนาม {{$pdfpetition ->sig_dean}} ({{$strDaysdean}}/{{$strMonthsdean}}/{{$strYearsdean}})
      
      
    </td>
    <td>
    <b><br align="center">4. เจ้าหน้าที่สำนักส่งเสริมวิชาการและงานทะเบียน</b>
      <br>..................................................................................................................................................................................................
      <br align="center">ลงนาม....................................
      <br align="right">(...................................) ..../..../....
      <br>
      <br align="center">
      <br>..................................................................................................................................................................................................
      <br align="center">ลงนาม...................................
      <br align="right">(...................................) ..../..../....
      <br>
    <b><br align="center">5. หัวหน้าสำนักงานเลขานุการ สวท./หัวหน้างานบริหาร</b>
      <br>..................................................................................................................................................................................................
      <br align="center">ลงนาม...................................
      <br align="right">(...................................) ..../..../....
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>