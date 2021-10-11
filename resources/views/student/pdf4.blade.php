<!DOCTYPE html>
<html lang="th">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>สวท.04</title>
    <style>

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  </head>
  <body >
  <br align="right">สวท.04
  @if($pdfpetition->Case_radio  == 'เปลี่ยนชื่อ-สกุล')
  <br align="right">[<b>x</b>]คำร้องขอเปลี่ยนชื่อ-สกุล [ ]ทำบัตรนักศึกษาใหม่
  @elseif($pdfpetition->Case_radio  == 'ทำบัตรนักศึกษาใหม่')
  <br align="right">[ ]คำร้องขอเปลี่ยนชื่อ-สกุล [<b>x</b>]ทำบัตรนักศึกษาใหม่
  @elseif($pdfpetition->Case_radio  == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล')
  <br align="right">[<b>x</b>]คำร้องขอเปลี่ยนชื่อ-สกุล [<b>x</b>]ทำบัตรนักศึกษาใหม่
  @endif
  <br>
  <hr>
  <br align="right">วันที่ {{$strDays}} เดือน {{$strMonthThais}} พ.ศ. {{$strYears}} 
  <br><b>เรียน</b> ผู้อำนวยการสำนักส่งเสริมวิชาการและงานทะเบียน 
  <dd><b>ข้าพเจ้า : </b>  {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp; <b>รหัสนักศึกษา</b> {{$pdfpetition ->studentcsv->IDstudent}} &nbsp;&nbsp;&nbsp;&nbsp; <b>เลชที่ประจำตัวประชาชน</b> {{$pdfpetition ->IDcard}}</dd>
  
  <br><b>สาขา</b> {{$pdfpetition ->studentcsv->Major}} &nbsp;&nbsp;&nbsp; <b>คณะ</b> {{$pdfpetition ->studentcsv->Faculty}} &nbsp;&nbsp;&nbsp;<b>หลักสูตร</b> {{$pdfpetition ->studentcsv->course}}
  <br><b>วันเดือนปีเกิด</b> {{$pdfpetition ->Birthday}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>เพศ</b> {{$pdfpetition ->Sex}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>สัญชาติ</b> {{$pdfpetition ->Nationality}}
  <br><b>ที่อยู่ปัจจุบัน:เลขที่</b> {{$pdfpetition ->House_number}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>หมู่บ้าน/อาคาร</b> {{$pdfpetition ->Building}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ชั้น</b>  {{$pdfpetition ->Floor}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>หมู่ที่</b> {{$pdfpetition ->Moo}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ซอย</b> {{$pdfpetition ->Soi}} 
  <br><b>ถนน</b> {{$pdfpetition ->Street}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>แขวง/ตำบล</b> {{$pdfpetition ->District}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>เขต/อำเภอ</b> {{$pdfpetition ->County}}
  <br><b>จังหวัด</b> {{$pdfpetition ->Province}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>รหัสไปรษณีย์</b> {{$pdfpetition ->Postal_code}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>โทรศัพท์</b> {{$pdfpetition ->Tel}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>โทรศัพท์มือถือ</b> {{$pdfpetition ->Tel_mobile}}
  <br><b>เข้าปีการศึกษา</b> {{$pdfpetition ->Year}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  @if($pdfpetition->Case_radio  == 'เปลี่ยนชื่อ-สกุล')
  <b>มีความประสงค์</b> [<b>x</b>] เปลี่ยนชื่อ-สกุล [ ] ทำบัตรนักศึกษาใหม่
  @elseif($pdfpetition->Case_radio  == 'ทำบัตรนักศึกษาใหม่')
  <b>มีความประสงค์</b> [ ] เปลี่ยนชื่อ-สกุล [<b>x</b>] ทำบัตรนักศึกษาใหม่
  @elseif($pdfpetition->Case_radio  == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล')
  <b>มีความประสงค์</b> [<b>x</b>] เปลี่ยนชื่อ-สกุล [<b>x</b>] ทำบัตรนักศึกษาใหม่
  @endif

  <br><b>ข้าพเจ้าได้แนบหลักฐาน ดังนี้</b>
  @if($pdfpetition->Case_radio  == 'เปลี่ยนชื่อ-สกุล')
  <br>[<b>x</b>] เปลี่ยนชื่อ-สกุล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ ] ทำบัตรนักศึกษาใหม่
  @elseif($pdfpetition->Case_radio  == 'ทำบัตรนักศึกษาใหม่')
  <br>[ ] เปลี่ยนชื่อ-สกุล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [<b>x</b>] ทำบัตรนักศึกษาใหม่
  @elseif($pdfpetition->Case_radio  == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล')
  <br>[<b>x</b>] เปลี่ยนชื่อ-สกุล &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [<b>x</b>] ทำบัตรนักศึกษาใหม่
  @endif
  <dd>- สำเนาบัตรประชาชน 1 ฉบับ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - รูปถ่าย(รูปชุดนักศึกษา)ขนาด 1 นิ้ว จำนวน 1 รูป</dd>
  <dd>- สำเนาหลักฐานการเปลี่ยนชื่อ-สกุล 1 ฉบับ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - สำเนาบัตรประชาชน 1 ฉบับ</dd>
  <br><br>
  <dd><b>จึงเรียนมาเพื่อโปรดทราบ</b></dd>
  <br>
  <b><br align="right">ขอแสดงความนับถือ  &nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <b><br align="right">ลงชื่อนักศึกษา</b> {{$pdfpetition ->studentcsv->Titlename}} {{$pdfpetition ->studentcsv->Fname}} {{$pdfpetition ->studentcsv->Lname}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <br>
  <hr>
  </br>
  <br><b>(กรณีทำบัตรนักศึกษา)</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; วันที่......... เดือน ................... พ.ศ. .........
  <dd>มหาวิทยาลัยเทคโนโลยีราชมงคลกรุงเทพ ได้ตรวจสอบแล้วว่า {{$pdfpetition ->Titlename}} {{$pdfpetition ->Fname}} {{$pdfpetition ->Lname}}</dd>
  <br>เป็นนักศึกษาของมหาวิทยาลัยจริงและขอให้ทางธนาคารดำเนินการจัดทำบัตรให้นักศึกษาดังกล่าว โดยมีรายละเอียดดังดังนี้
  <br>สถานภาพปัจจุบัน <b>{{$pdfpetition ->Status_stu}}</b> วันที่ออกบัตร <b>{{$pdfpetition ->Daystart_card}}</b> วันที่บัตรหมดอายุ <b>{{$pdfpetition ->Dayend_card}}</b>
  <dd>จึงเรียนมาเพื่อโปรดดำเนินการ จักขอบคุณยิ่ง</dd>
  <br>
  <table cellpadding="15">
  <tr>
  
    <td>
        <br align="center"> {{$pdfpetition ->Sig_register}} ({{$strDaysregister}}/{{$strMonthsregister}}/{{$strYearsregister}})
        <b><br align="center"> เจ้าหน้าที่ สวท.(ผู้ตรวจสอบ)</b>
        <br>
        <br>
        <b><br align="center"> 1.ส่วนธนาคาร</b>
        <br>[ ] รับเอกสารแล้ว ........../........../..........
        <br>ลงชื่อ .............................................
        <br align="right">(.............................................)........./........./.........
    </td>
    
    <td>
        <br align="center"> ...............................................
        <br align="center"> (...........................................................)
        <br align="center"> ...............................................
        <br>
        <b><br align="center"> 2.นักศึกษา</b>
        <br>[ ] ได้รับบัตรนักศึกษาแล้ว
        <br>ลงชื่อ .............................................
        <br align="right">(.............................................)........./........./.........
    </td>
  </tr>
  </table>
  <hr>
  </body>
</html>