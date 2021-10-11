@extends('layouts.admin')
@section('body')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>

<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

<link href="{{ asset('dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
<script src="{{ asset('dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src= "{{ asset('dist/locales/bootstrap-datepicker.th.min.js') }} "charset="UTF-8"></script>



<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: true,
            language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
            thaiyear: true              //Set เป็นปี พ.ศ.
        }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
    });
</script>
<style>
    .box{
        display: none;
        margin-top: 20px;
    }
    label{ margin-right: 15px; }
</style>
<script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>
</head>

<div class="table-responsive">
    <blockquote class="blockquote text-center">
    <h2>แก้ไขคำร้องที่ไม่อนุมัติ</h2><br />
  <p class="mb-0">ทางผู้อนุมัติไม่สามารถทำการอนุมัติคำร้องได้โปรดเช็คข้อแนะนำจากทางผู้อนุมัติ</p>
  <footer class="blockquote-footer"><a href="#addnew" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>คลิ๊กที่นี้เพื่อดูข้อแนะนำจากผู้อนุมัติ</a></footer>
</blockquote>
    <form action="/form04/editpetition/{{$show04 ->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

           
    <div class="form-group row mb-0">
        <div class="col-md-2">
            <label for="name">วันที่</label>
            <input type="text" class="form-control" name="date"  id="date" value="<?=date('d-m-Y')?>"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-5">
            <label for="name">เรียน</label>
            <input type="text" class="form-control" name="dear" id=""value="ผู้อำนวยการสำนักส่งเสริมวิชาการและงานนทะเบียน"readonly>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-2">
            <label for="name">คำนำหน้า</label>
            <input type="text" class="form-control" name="titlename" id="" value ="{{$show04 ->studentcsv->Titlename}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="fname" id="" value ="{{$show04 ->studentcsv->Fname}} "readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">นามสกุล</label>
            <input type="text" class="form-control" name="lname" id="" value ="{{$show04 ->studentcsv->Lname}}"readonly>
        </div>
        
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-2  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id="" value ="{{$show04 ->studentcsv ->IDstudent}}"readonly>
        </div>
        
        <div class="col-md-4  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id="" value ="{{$show04 ->studentcsv ->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$show04 ->studentcsv ->Faculty}}"readonly>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$show04 ->studentcsv ->course}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-3  offset-md-0">
            <label for="name">รหัสบัตรประชาชน</label>
            <input type="text" class="form-control" name="idcard" id=""placeholder="กรอกเลขบัตรประชาชน"required>
        </div>
        </div>
        
        <div class="row">
        <div class="col-md-2">
            <label for="birthday">วันเดือนปีเกิด</label>
            <input id="inputdatepicker" class="datepicker form-control" name="birthday" data-date-format="mm/dd/yyyy">
        </div>
        <div class="col-md-2">
            <label for="sex">เพศ</label>
            <select class="form-control" name="sex">
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="nationality">สัญชาติ</label>
            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="สัญชาติ">
        </div>
        </div>
        </br>

        <h5 class="card-header">**กรอกรายละเอียดที่อยู่**</h5>
        </br>
        <div class="row">
        <div class="col-md-2">
            <label for="house_number">บ้านเลขที่</label>
            <input type="text" class="form-control" name="house_number" id="house_number" placeholder="บ้านเลขที่">
        </div>
        <div class="col-md-3">
            <label for="building">หมู่บ้าน/อาคาร</label>
            <input type="text" class="form-control" name="building" id="building" placeholder="หมู่บ้าน/อาคาร">
        </div>
        <div class="col-md-1">
            <label for="floor">ชั้น</label>
            <input type="text" class="form-control" name="floor" id="floor" placeholder="ชั้น">
        </div>
        <div class="col-md-1">
            <label for="moo">หมู่ที่</label>
            <input type="text" class="form-control" name="moo" id="moo" placeholder="หมู่ที่">
        </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <label for="soi">ซอย</label>
            <input type="text" class="form-control" name="soi" id="soi" placeholder="ซอย">
        </div>
        <div class="col-md-3">
            <label for="street">ถนน</label>
            <input type="text" class="form-control" name="street" id="street" placeholder="ถนน">
        </div>
        </div>
        <div class="row">

        <div class="col-md-3">
        <label for="name">จังหวัด</label>
        <input type="text" class="form-control"  name="province" id="province" autocomplete="off" placeholder="กรอกข้อมูล">
            </div>
            
        <div class="col-md-3">
        <label for="name">เขต</label>
        <input type="text" class="form-control"  name="county" id="amphoe" autocomplete="off" placeholder="กรอกข้อมูล"> 
        </div>
        
        <div class="col-md-3">
        <label for="name">แขวง</label>
        <input type="text" class="form-control"  name="district" id="district" autocomplete="off" placeholder="กรอกข้อมูล">
            </div>
       
        <div class="col-md-3">
        <label for="name">รหัสไปรษณีย์</label>
        <input type="text" class="form-control" name="postal_code" id="zipcode" autocomplete="off" placeholder="กรอกข้อมูล">
        </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <label for="tel">โทรศัพท์</label>
            <input type="text" class="form-control" name="tel" id="tel" placeholder="โทรศัพท์">
        </div>
        <div class="col-md-2">
            <label for="mobile">โทรศัพท์มือถือ</label>
            <input type="text" class="form-control" name="tel_mobile" id="mobile" placeholder="โทรศัพท์มือถือ"> 
            
        </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <label for="year">เข้าปีการศึกษา</label>
            <input type="text" class="form-control" name="year" id="year" placeholder="เข้าปีการศึกษา">
        </div>
        </div>
        </br>
        <h5 class="card-header">**เลือกหัวข้อที่ต้องการ**</h5>
        </br>

        <div class="form-check">
        <label><input  name="caseRadio[]" type="checkbox" value="ทำบัตรนักศึกษาใหม่"> กรณีที่ 1 ทำบัตรนักศึกษาใหม่</label>
        </div>
       
        
            
          <div class="form-check ทำบัตรนักศึกษาใหม่ box">
           
            <p> อัพโหลด รูปถ่าย(รูปชุดนักศึกษา)</p>
            <input type="file" class="form-control" name="image" id="image" ></br>
            <p> อัพโหลด สำเนาบัตรประชาชน</p>
            <input type="file" class="form-control" name="id_card1" id="id_card1" ></br>
         
        </div>

        <div class="form-check">
        <label><input  name="caseRadio[]" type="checkbox" value="เปลี่ยนชื่อ-สกุล"> กรณีที่ 2 เปลี่ยนชื่อ-สกุล</label>
        </div>

        <div class="form-check เปลี่ยนชื่อ-สกุล box">
            
    
            <p> อัพโหลด สำเนาบัตรประชาชน</p>
            <input type="file" class="form-control" name="id_card2" id="id_card2" ></br>
            <p> อัพโหลด สำเนาหลักฐานการเปลี่ยนชื่อ-สกุล</p>
            <input type="file" class="form-control" name="change_name" id="change_name" >
        </div>
        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
<script>
$.Thailand({
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});
</script>
@endsection
@include('model/model04')
