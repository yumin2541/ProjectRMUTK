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
<div class="card-header">สวท.05 ใบคำร้องขอลาพัก</div><br />

@if ($errors->has('file_stay'))
    <div class="alert alert-danger">
        
         **อัพโหลดเฉพาะข้อมูลไฟล์ PDF**
        
    </div>
@endif
@if ($errors->has('caseRadio'))
    <div class="alert alert-danger">
        
         **โปรดเลือกรายละเอียดการลา**
        
    </div>
    @endif

    <form  action="{{ route('create05') }}" method="post" enctype="multipart/form-data">
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
        <div class="col-sm-5">
            <label for="name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="titlename" id="" value ="{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly>
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
        
        </div>
        </br>
        <div class="form-inline " >

            <label>เข้าปีการศึกษา </label>
            &emsp;
            
            <input type="text" class="form-control" name="startyear" size="4" value = "25<?=substr("{{$users ->first()->IDstudent}}",1,2)?>"readonly>
            &emsp;
            <label>มีความประสงค์ขอลาพักการศึกษา ในภาคการศึกษาที่</label>
            &emsp;
            <select class="form-control" id="sel1" name="sec" required>
                <option value="">--โปรดเลือก--</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            &emsp;
            <label>ปีการศึกษาที่</label>
            &emsp;
            <input type="text" class="form-control" name="schoolyear" size="4" required>
        </div>

        </br>
        <h5 class="card-header">**รายละเอียดการลาพัก**</h5>
        </br>      

        <div class="form-check">
        <label><input  name="caseRadio" type="radio" value="ครั้งแรก"> ครั้งแรก</label>
        </div> 
         
        
        <div class="form-check">
        <label><input  name="caseRadio" type="radio" value="มากกว่า1ครั้ง"> มากกว่า 1 ครั้ง</label>
        </div>

        <div class="มากกว่า1ครั้ง box">
        <div class="form-inline" >

        &emsp;&emsp;&emsp;&emsp;&emsp;<label>ครั้งที่ </label>
            &emsp;
            
            <input type="text" class="form-control" name="numstay" size="4">
            &emsp;
            <label>โดยคร้ังก่อนได้ลาพัก ในภาคการศึกษาที่</label>
            &emsp;
            <select class="form-control" id="sel1" name="secstay" >
                <option value="">--โปรดเลือก--</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            &emsp;
            <label>ปีการศึกษาที่</label>
            &emsp;
            <input type="text" class="form-control" name="yearstay" size="4">
            
        </div>
        </br>   </br>
        </div>
        
        
        <div class="form-check">
        <label><input  name="caseRadio" type="radio" value="ลาพักการศึกษาเกินกว่า 2 ภาคการศึกษาปกติติดต่อกัน"> ลาพักการศึกษาเกินกว่า 2 ภาคการศึกษาปกติติดต่อกัน</label>
        </div>

        <div class="form-group">
        <p class="text"><strong>เหตุผล (นักศึกษาที่ลาพักการศึกษาต้องทำคำร้องขอกลับเข้าศึกษาในภาคการศึกษาถัดไป)</strong></p>
        <textarea class="form-control" name="reason" rows="5" id="comment" required></textarea>
        </div>

    
        </br>
        <div class="form-inline" >
        <p> อัพโหลดหลักฐานที่เกี่ยวข้องกับการขอลาพักการศึกษา </p> &emsp; <p  class="text-danger"><strong> **เฉพาะไฟล์ PDF **</strong></p>
        </div>            
            <input type="file" class="form-control"  name="file_stay" id="" required>
        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
</div>
@endsection