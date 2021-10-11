@extends('layouts.admin')
@section('body')
<div class="table-responsive">
    

    <blockquote class="blockquote text-center">
    <h2>แก้ไขคำร้องที่ไม่อนุมัติ</h2><br />
  <p class="mb-0">ทางผู้อนุมัติไม่สามารถทำการอนุมัติคำร้องได้โปรดเช็คข้อแนะนำจากทางผู้อนุมัติ</p>
  <footer class="blockquote-footer"><a href="#addnew" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>คลิ๊กที่นี้เพื่อดูข้อแนะนำจากผู้อนุมัติ</a></footer>
</blockquote>
    <form action="/form01/editpetition/{{$show01 ->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row mb-0">
        <div class="col-md-2">
            <label for="name">วันที่</label>
            <input type="text"  name="date"  id="date" value="<?=date('d-m-Y')?>"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-4">
            <label for="name">เรียน</label>
            <input type="text" class="form-control" name="dear" id="" placeholder=""value ="{{$show01 ->Dear}} ">
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-4 offset-md-0">
            <label for="name">เรื่อง</label>
            <input type="text" class="form-control" name="header" id="" placeholder=""value ="{{$show01 ->Header}} ">
        </div>
        </div>
        
        <div class="form-group row mb-0">
        <div class="col-md-2 offset-md-0">
            <label for="type">คำนำหน้า</label>
            <input type="text" class="form-control" name="titlename" id=""value ="{{$show01 ->studentcsv->Titlename}} "readonly>
        </div>
        <div class="col-md-8 offset-md-0">
            <label for="name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="name" id=""value ="{{$show01 ->studentcsv->Fname}} {{$show01 ->studentcsv->Lname}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id=""value ="{{$show01 ->studentcsv->IDstudent}}"readonly>
        </div>
        <div class="col-md-4  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id=""value ="{{$show01 ->studentcsv->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$show01 ->studentcsv->Faculty}}"readonly>
        </div>
        
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$show01 ->studentcsv->course}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-0" style="margin-top:15px;">
            <label style="color:black;"> มีความประสงค์</label>
            <textarea class="form-control span12" name="body" id="" rows="10" cols="100" placeholder="กรอกรายละเอียด" data-validation-required-message="Please enter your message" minlength="5"
              data-validation-minlength-message="Min 5 characters" data-toggle="tooltip" title="Input Message Content between 50 to 500" required></textarea>
        </div>
        </div>
        <br />
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
@endsection
@include('model/model01')