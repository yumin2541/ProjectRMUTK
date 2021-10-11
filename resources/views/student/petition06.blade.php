@extends('layouts.admin')
@section('body')


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<div class="table-responsive">
<div class="card-header">สวท.06 ใบคำร้องรักษาสภาพ</div><br />
@if ($errors->has('file_check'))
    <div class="alert alert-danger">
        
         **อัพโหลดเฉพาะข้อมูลไฟล์ PDF**
        
    </div>
@endif
@if ($errors->has('caseRadio'))
    <div class="alert alert-danger">
        
        **โปรดเลือกความประสงค์**
        
    </div>
    @endif
    <form  action="{{ route('create06') }}" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="titlename" id="" value ="{{$users ->first()->Titlename}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="fname" id="" value ="{{$users ->first()->Fname}} "readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">นามสกุล</label>
            <input type="text" class="form-control" name="lname" id="" value ="{{$users ->first()->Lname}}"readonly>
        </div>
        
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-2  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id="" value ="{{$users ->first()->IDstudent}}"readonly>
        </div>
        
        <div class="col-md-4  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id="" value ="{{$users ->first()->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$users ->first()->Faculty}}"readonly>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$users ->first()->course}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-5  offset-md-0">
            <label for="name">เบอร์โทรติดต่อ</label>
            <input type="text" class="form-control" name="phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" placeholder="กรุณากรอกเบอร์ที่สามารถติดต่อได้"required>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">เข้าปีการศึกษา</label>
            <input type="text" class="form-control" name="startyear" value = "25<?=substr("{{$users ->first()->IDstudent}}",1,2)?>"readonly>
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

        </br>
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
        

        </br>
        <div class="form-inline" >
        <p> อัพโหลดสำเนาใบเสร็จรับเงินค่ารักษาสภาพการเป็นนักศึกษา </p> &emsp; <p  class="text-danger"><strong> **เฉพาะไฟล์ PDF **</strong></p>
        </div>
            <input type="file" class="form-control"  name="file_check" id="" required>
       
        
        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
</div>
@endsection