@extends('layouts.admin')
@section('body')

<style>
    .box{
        display: none;
        margin-top: 20px;
    }
    label{ margin-right: 15px; }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

<div class="table-responsive">
<blockquote class="blockquote text-center">
    <h2>แก้ไขคำร้องที่ไม่อนุมัติ</h2><br />
  <p class="mb-0">ทางผู้อนุมัติไม่สามารถทำการอนุมัติคำร้องได้โปรดเช็คข้อแนะนำจากทางผู้อนุมัติ</p>
  <footer class="blockquote-footer"><a href="#addnew" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>คลิ๊กที่นี้เพื่อดูข้อแนะนำจากผู้อนุมัติ</a></footer>
</blockquote>

    <form  action="/form06/editpetition/{{$show06 ->id}}" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="titlename" id="" value ="{{$show06 ->studentcsv->Titlename}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="fname" id="" value ="{{$show06 ->studentcsv->Fname}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">นามสกุล</label>
            <input type="text" class="form-control" name="lname" id="" value ="{{$show06 ->studentcsv->Lname}}"readonly>
        </div>
        
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-2  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id="" value ="{{$show06 ->studentcsv->IDstudent}}"readonly>
        </div>
        
        <div class="col-md-4  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id="" value ="{{$show06 ->studentcsv->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$show06 ->studentcsv->Faculty}}"readonly>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$show06 ->studentcsv->course}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-5  offset-md-0">
            <label for="name">เบอร์โทรติดต่อ</label>
            <input type="text" class="form-control" name="phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"placeholder="กรุณากรอกเบอร์ที่สามารถติดต่อได้"required>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">เข้าปีการศึกษา</label>
            <input type="text" class="form-control" name="startyear" value = "{{$show06 ->Startyear}}"readonly>
        </div>
        </div>
        </br>
        </br>
        <h5 class="card-header">**มีความประสงค์**</h5>
        </br>      

        <div class="form-check">
        <label><input  name="caseRadio" type="radio" value="นักศึกษาตกค้าง">ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาตกค้าง)</label>
        </div> 

        
        
        <div class="form-check">
        <label><input  name="caseRadio" type="radio" value="นักศึกษาผลการเรียนไม่สมบูรณ์">ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาผลการเรียนไม่สมบูรณ์ I )</label>
        </div>

        <div class="form-inline" >

        &emsp;&emsp;<label>ในภาคเรียนที่ </label>
            &emsp;
            <select class="form-control" id="sel1" name="startyear_case" >
                <option value="">--โปรดเลือก--</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            &emsp;
            <label>ปีการศึกษาที่</label>
            &emsp;
            <input type="text" class="form-control" name="sec" size="4">
            &emsp;
        </div>
        <div class="col-md-5  offset-md-1">
            <label>เนื่องจาก</label>
            <textarea class="form-control" rows="5" name="because"></textarea>
        </div>

        <div class="col-md-8  offset-md-0">
        </br>
            <label >อัพโหลดสำเนาใบเสร็จรับเงินค่ารักษาสภาพการเป็นนักศึกษา (ไฟล์ PDF เท่านั้น)</label>
            <input type="file" class="form-control"  name="file_check" id="" >
        </div>
        
        </br>
        </br>
        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
</div>
@endsection
@include('model/model06')