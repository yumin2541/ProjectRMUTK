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
   
    <form  action="/form05/editpetition/{{$show05 ->id}}" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="titlename" id="" value ="{{$show05 ->studentcsv->Titlename}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" name="fname" id="" value ="{{$show05 ->studentcsv->Fname}}"readonly>
        </div>
        <div class="col-md-2 ">
            <label for="name">นามสกุล</label>
            <input type="text" class="form-control" name="lname" id="" value ="{{$show05 ->studentcsv->Lname}}"readonly>
        </div>
        
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-2  offset-md-0">
            <label for="name">รหัสนักศึกษา</label>
            <input type="text" class="form-control" name="idstudent" id="" value ="{{$show05 ->studentcsv->IDstudent}}"readonly>
        </div>
        
        <div class="col-md-4  offset-md-0">
            <label for="name">สาขา</label>
            <input type="text" class="form-control" name="major" id="" value ="{{$show05 ->studentcsv->Major}}"readonly>
        </div>
        </div>

        <div class="form-group row mb-0">
        <div class="col-md-4  offset-md-0">
            <label for="name">คณะ</label>
            <input type="text" class="form-control" name="faculty" id="" value ="{{$show05 ->studentcsv->Faculty}}"readonly>
        </div>
        <div class="col-md-2  offset-md-0">
            <label for="name">หลักสูตร</label>
            <input type="text" class="form-control" name="course" id="" value ="{{$show05 ->studentcsv->course}}"readonly>
        </div>
        </div>
        <div class="form-group row mb-0">
        <div class="col-md-5  offset-md-0">
            <label for="name">เบอร์โทรติดต่อ</label>
            <input type="text" class="form-control" name="phone" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}"placeholder="กรุณากรอกเบอร์ที่สามารถติดต่อได้"required>
        </div>
        </div>
        </br>
        <div class="form-inline " >

            <label>เข้าปีการศึกษา </label>
            &emsp;
            
            <input type="text" class="form-control" name="startyear" size="4" value ="{{$show05 ->Startyear}}"readonly>
            &emsp;
            <label>มีความประสงค์ขอลาพักการศึกษา ในภาคการศึกษาที่</label>
            &emsp;
            <input type="text" class="form-control" name="sec" size="4">
            &emsp;
            <label>ปีการศึกษาที่</label>
            &emsp;
            <input type="text" class="form-control" name="schoolyear" size="4">
        </div>

        </br>
        <h5 class="card-header">**เลือกหัวข้อที่ต้องการ**</h5>
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
            <input type="text" class="form-control" name="secstay" size="4">
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
        <textarea class="form-control" name="reason" rows="5" id="comment" ></textarea>
        </div>

        <div class="col-md-6  offset-md-0">
        </br>
            <label for="image">อัพโหลดหลักฐานที่เกี่ยวข้องกับการขอลาพักการศึกษา (ไฟล์ PDF เท่านั้น)</label>
            <input type="file" class="form-control"  name="file_stay" id="" >
        </div>

        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
</div>
@endsection
@include('model/model05')