@extends('layouts.admin')
@section('body')


<div class="table-responsive">
<div class="card-header">สวท.07 ใบคำร้องขอลาออก</div><br />

    <form  action="{{ route('create07') }}" method="post" enctype="multipart/form-data">
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

        <div class="form-inline" >

        &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;<label>ขอลาออกจากการเป็นนักศึกษาในภาคการศึกษาที่</label>
            &emsp;
            <select class="form-control" id="sel1" name="sec_out" required>
                <option value="">--โปรดเลือก--</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            &emsp;
            <label>ปีการศึกษา</label>
            &emsp;
            <input type="text" class="form-control" name="year_out" size="4" required>
            &emsp;
        </div>
        <div class="col-md-8  offset-md-1">

            
            <label>เนื่องจาก</label>
            <textarea class="form-control" rows="5" name="because_out" required></textarea>
            </br>
        </br>
        <h4 class="text-danger">**นักศึกษาต้องไม่มีหนี้สินกับมหาวิทยาลัย**</h4>
        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
</div>
@endsection