@extends('layouts.admin')
@section('body')
<div class="table-responsive">
<div class="card-header">สวท.01 ใบคำร้องทั่วไป</div><br />
   
    <form action="{{ route('create01') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row mb-0">
        <div class="col-md-2">
            <label for="name">วันที่</label>
            <input type="text"  class="form-control" name="date"  id="date" value="<?=date('d-m-Y')?>"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-4">
            <label for="name">เรียน</label>
            <input type="text" class="form-control" name="dear" data-validation-required-message="Please enter your message" value ="คณบดี{{$users ->first()->Faculty}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-4 offset-md-0">
            <label for="name">เรื่อง</label>
            <input type="text" class="form-control" name="header" data-validation-required-message="Please enter your message" placeholder=""required>
        </div>
        </div>
        
        <div class="form-group row mb-0">
        
        <div class="col-md-3 offset-md-0">
            <label for="name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="name" id=""value ="{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-2  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id=""value ="{{$users ->first()->IDstudent}}"readonly>
        </div>
        <div class="col-md-3  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id=""value ="{{$users ->first()->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-3  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$users ->first()->Faculty}}"readonly>
        </div>
        
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$users ->first()->course}}"readonly>
        </div>
          
    
        <div class="col-md-4  offset-md-0">
            <label for="name">เบอร์โทรติดต่อ</label>
            <input type="text" class="form-control" name="phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" data-validation-required-message="Please enter your message" placeholder="กรุณากรอกเบอร์ที่สามารถติดต่อได้"required>
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