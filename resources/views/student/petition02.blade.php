@extends('layouts.admin')
@section('body')
<head>
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
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>
</script>
</head>
<div class="table-responsive">
    <div class="card-header">สวท.02 ใบคำร้องขอหนังสือรับรองและใบรายงานผลการศึกษา (นักศึกษาปัจจุบัน)</div><br />
   
    @if ($errors->has('caseRadio'))
    <div class="alert alert-danger">
        
        **โปรดเลือกความประสงค์**
        
    </div>
    @endif
    <form action="{{ route('create02') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row mb-0">
        <div class="col-md-4">
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
        <div class="form-group row mb-0">
        <div class="col-md-4 offset-md-0">
            <label for="name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="name_th" id="" value ="{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly>
        </div>
        <div class="col-md-4 offset-md-0">
            <label for="name">ชื่อ-นามสกุล ภาษาอังกฤษ</label>
            <input type="text" class="form-control" name="name_eng" id="" value ="{{$users ->first()->Titlename_eng}} {{$users ->first()->Fname_eng}} {{$users ->first()->Lname_eng}}"readonly>
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
        <div class="col-md-3  offset-md-0">
            <label for="name">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" name="phone"onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" data-validation-required-message="Please enter your message" placeholder="เบอร์ที่สามารถติดต่อได้"required >
        </div>
        </div>
        
        <br />
        <div class="card-header">มีความประสงค์</div>
        <div class="card-body">
        <div>
        <div class="form-check">
        <label><input type="checkbox" name="caseRadio[]" value="ขอหนังสือรับรอง"> กรณีที่ 1 ขอหนังสือรับรอง</label>
        </div>
        
        </div>
        


        <div class="col-md-3  offset-md-0 ขอหนังสือรับรอง box">
            <label for="type">สถานะ</label>
            <select class="form-control" name="status_case1">
                    <option value=" - ">-- โปรดเลือก --</option>
                    <option value="นักศึกษาปัจจุบัน">นักศึกษาปัจจุบัน</option>
                    <option value="รอสภาอนุมัติ">รอสภาอนุมัติ (เรียนครบหลักสูตร ภาคเรียนสุดท้าย)</option>
            </select>
        </div>
        
        <div class="col-md-3  offset-md-0 ขอหนังสือรับรอง box">
            <label for="type">นำไปใช้เพื่ออะไร</label>
            <select class="form-control" name="for_case1">
                    <option value=" - ">-- โปรดเลือก --</option>
                    <option value="สมัครงาน">สมัครงาน</option>
                    <option value="ศึกษาต่อ">ศึกษาต่อ</option>
                    <option value="อื่นๆ">อื่นๆ </option>
            </select>
            
        </div>
        </br>
        <div class="col-md-8  offset-md-0 ขอหนังสือรับรอง box">
        <h5> ** โปรดเลือกภาษาของหนังสือรับรองที่ต้องการและจำนวนที่ต้องการ **</h5>
        </div>
        <div class="row offset-sm-0">
        
        <div class="col-md-3  offset-md-0 ขอหนังสือรับรอง box">
        <label for="type">ภาษาไทย</label>
            <select class="form-control" name="certTH_case1">
                    <option value="0">-- โปรดเลือก --</option>
                    <option value="1">1 ชุด</option>
                    <option value="2">2 ชุด</option>
                    <option value="3">3 ชุด</option>
                    <option value="4">4 ชุด</option>
                    <option value="5">5 ชุด</option>
                    <option value="6">6 ชุด</option>
                    <option value="7">7 ชุด</option>
                    <option value="8">8 ชุด</option>
                    <option value="9">9 ชุด</option>
                    <option value="10">10 ชุด</option>
            </select>
            </div>
            <div class="col-md-3  offset-md-0 ขอหนังสือรับรอง box">
            <label for="type">ภาษาอังกฤษ</label>
            <select class="form-control" name="certEN_case1">
                    <option value="0">-- โปรดเลือก --</option>
                    <option value="1">1 ชุด</option>
                    <option value="2">2 ชุด</option>
                    <option value="3">3 ชุด</option>
                    <option value="4">4 ชุด</option>
                    <option value="5">5 ชุด</option>
                    <option value="6">6 ชุด</option>
                    <option value="7">7 ชุด</option>
                    <option value="8">8 ชุด</option>
                    <option value="9">9 ชุด</option>
                    <option value="10 ">10 ชุด</option>
            </select>
            </div>
            </div>
          </br>  </br>

        <div class="form-check">
        <label><input type="checkbox" name="caseRadio[]" value="ขอใบรายงานผลการศึกษา"> กรณีที่ 2 ขอใบรายงานผลการศึกษา</label>
        </div>
       
        <div class="col-md-3  offset-md-0 ขอใบรายงานผลการศึกษา box">
            <label for="type">นำไปใช้เพื่ออะไร</label>
            <select class="form-control" name="for_case2">
                    <option value=" - ">-- โปรดเลือก --</option>
                    <option value="สมัครงาน">สมัครงาน</option>
                    <option value="ศึกษาต่อ">ศึกษาต่อ</option>
                    <option value="อื่นๆ">อื่นๆ </option>
            </select>
            
        </div>
        </br>
        <div class="col-md-8  offset-md-0 ขอใบรายงานผลการศึกษา box">
        <h5> ** โปรดเลือกภาษาของใบรายงานผลการศึกษาที่ต้องการและจำนวนที่ต้องการ **</h5>
        </div>
        <div class="row offset-sm-0">
        
        <div class="col-md-3  offset-md-0 ขอใบรายงานผลการศึกษา box">
        <label for="type">ภาษาไทย</label>
            <select class="form-control" name="certTH_case2">
                    <option value="0">-- โปรดเลือก --</option>
                    <option value="1">1 ชุด</option>
                    <option value="2">2 ชุด</option>
                    <option value="3">3 ชุด</option>
                    <option value="4">4 ชุด</option>
                    <option value="5">5 ชุด</option>
                    <option value="6">6 ชุด</option>
                    <option value="7">7 ชุด</option>
                    <option value="8">8 ชุด</option>
                    <option value="9">9 ชุด</option>
                    <option value="10">10 ชุด</option>
            </select>
            </div>
            <div class="col-md-3  offset-md-0 ขอใบรายงานผลการศึกษา box">
            <label for="type">ภาษาอังกฤษ</label>
            <select class="form-control" name="certEN_case2">
                    <option value="0">-- โปรดเลือก --</option>
                    <option value="1">1 ชุด</option>
                    <option value="2">2 ชุด</option>
                    <option value="3">3 ชุด</option>
                    <option value="4">4 ชุด</option>
                    <option value="5">5 ชุด</option>
                    <option value="6">6 ชุด</option>
                    <option value="7">7 ชุด</option>
                    <option value="8">8 ชุด</option>
                    <option value="9">9 ชุด</option>
                    <option value="10">10 ชุด</option>
            </select>
            </div>
            </div>
            </div>
       

        <br />
        <br />
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
</div>
@endsection