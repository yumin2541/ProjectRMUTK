@extends('layouts.admin')
@section('body')
<div class="table-responsive">
    

    <blockquote class="blockquote text-center">
    <h2>แก้ไขคำร้องที่ไม่อนุมัติ</h2><br />
  <p class="mb-0">ทางผู้อนุมัติไม่สามารถทำการอนุมัติคำร้องได้โปรดเช็คข้อแนะนำจากทางผู้อนุมัติ</p>
  <footer class="blockquote-footer"><a href="#addnew" data-toggle="modal" ><span class="glyphicon glyphicon-plus"></span>คลิ๊กที่นี้เพื่อดูข้อแนะนำจากผู้อนุมัติ</a></footer>
</blockquote>
    <form action="/form07/editpetition/{{$show07 ->id}}" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="titlename" id="" value ="{{$show07 ->studentcsv->Titlename}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="fname" id="" value ="{{$show07 ->studentcsv->Fname}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">นามสกุล</label>
            <input type="text" class="form-control" name="lname" id="" value ="{{$show07 ->studentcsv->Lname}}"readonly>
        </div>
        
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-2  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id="" value ="{{$show07 ->studentcsv->IDstudent}}"readonly>
        </div>
        
        <div class="col-md-4  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id="" value ="{{$show07 ->studentcsv->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$show07 ->studentcsv->Faculty}}"readonly>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$show07 ->studentcsv->course}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-5  offset-md-0">
            <label for="name">เบอร์โทรติดต่อ</label>
            <input type="text" class="form-control" name="phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"placeholder="กรุณากรอกเบอร์ที่สามารถติดต่อได้"required>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">เข้าปีการศึกษา</label>
            <input type="text" class="form-control" name="startyear" value = "{{$show07 ->Startyear}}"readonly>
        </div>
        </div>
        </br>
        </br>
        <h5 class="card-header">**มีความประสงค์**</h5>
        </br>      

        <div class="form-inline" >

        &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;<label>ขอลาออกจากการเป็นนักศึกษาในภาคการศึกษาที่</label>
            &emsp;
            
            <input type="text" class="form-control" name="sec_out" size="4" required>
            &emsp;
            <label>ปีการศึกษา</label>
            &emsp;
            <input type="text" class="form-control" name="year_out" size="4" required>
            &emsp;
        </div>
        <div class="col-md-8  offset-md-1">
        <h4 class="text-danger">**นักศึกษาต้องไม่มีหนี้สินกับมหาวิทยาลัย**</h4>
            
            <label>เนื่องจาก</label>
            <textarea class="form-control" rows="5" name="because_out" required></textarea>
            </div>
        <br />
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
        <br />
    </form>
</div>
@endsection
@include('model/model07')