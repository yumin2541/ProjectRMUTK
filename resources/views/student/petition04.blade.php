@extends('layouts.admin')
@section('body')

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

  <div class="table-responsive">
  <h5 class="card-header">สวท.04 ใบขอเปลี่ยนชื่อนามสกุลและทำบัตร</h5><br />

  
  @if ($errors->all())
    <div class="alert alert-danger">
        
    **กรุณากรอกข้อมูลให้ถูกต้อง**
        
    </div>
    @endif
   
    <form action="{{ route('create04') }}" method="post" enctype="multipart/form-data">
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
        <div class="col-md-5">
            <label for="name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" name="name" id="" value ="{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly>
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
        <div class="col-md-3  offset-md-0">
            <label for="name">รหัสบัตรประชาชน</label>
            <input type="text" class="form-control" name="idcard" id=""placeholder="กรอกเลขบัตรประชาชน"required>
        </div>
        </div>
        
        <div class="row">
        <div class="col-md-2">
            <label for="birthday">วันเดือนปีเกิด</label>
            <input id="inputdatepicker" class="datepicker form-control" name="birthday" data-date-format="mm/dd/yyyy" required>
        </div>
        <div class="col-md-2">
            <label for="sex">เพศ</label>
            <select class="form-control" name="sex" required>
                <option value="">--โปรดเลือก--</option>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="nationality">สัญชาติ</label>
            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="สัญชาติ" required>
        </div>
        </div>
        </br>
        <h5 class="card-header">**กรอกรายละเอียดที่อยู่**</h5>
        </br>
        <div class="row">
        <div class="col-md-2">
            <label for="house_number">บ้านเลขที่</label>
            <input type="text" class="form-control" name="house_number" id="house_number" placeholder="บ้านเลขที่"required>
        </div>
        <div class="col-md-3">
            <label for="building">หมู่บ้าน/อาคาร</label>
            <input type="text" class="form-control" name="building" id="building" placeholder="หมู่บ้าน/อาคาร"required>
        </div>
        <div class="col-md-1">
            <label for="floor">ชั้น</label>
            <input type="text" class="form-control" name="floor" id="floor" placeholder="ชั้น"required>
        </div>
        <div class="col-md-1">
            <label for="moo">หมู่ที่</label>
            <input type="text" class="form-control" name="moo" id="moo" placeholder="หมู่ที่"required>
        </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <label for="soi">ซอย</label>
            <input type="text" class="form-control" name="soi" id="soi" placeholder="ซอย"required>
        </div>
        <div class="col-md-3">
            <label for="street">ถนน</label>
            <input type="text" class="form-control" name="street" id="street" placeholder="ถนน"required>
        </div>
        </div>
        <div class="row">

        <div class="col-md-3">
        <label for="name">จังหวัด</label>
        <input type="text" class="form-control"  name="province" id="province" autocomplete="off" placeholder="กรอกข้อมูล" required>
            </div>
            
        <div class="col-md-3">
        <label for="name">เขต/อำเภอ</label>
        <input type="text" class="form-control"  name="county" id="amphoe" autocomplete="off" placeholder="กรอกข้อมูล" required> 
        </div>
        
        <div class="col-md-3">
        <label for="name">แขวง/ตำบล</label>
        <input type="text" class="form-control"  name="district" id="district" autocomplete="off" placeholder="กรอกข้อมูล" required>
            </div>
       
        <div class="col-md-3">
        <label for="name">รหัสไปรษณีย์</label>
        <input type="text" class="form-control" name="postal_code" id="zipcode" autocomplete="off" placeholder="กรอกข้อมูล" required>
        </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <label for="tel">โทรศัพท์</label>
            <input type="text" class="form-control" name="tel" id="tel" placeholder="โทรศัพท์" required>
        </div>
        <div class="col-md-2">
            <label for="mobile">โทรศัพท์มือถือ</label>
            <input type="text" class="form-control" name="tel_mobile" id="mobile" placeholder="โทรศัพท์มือถือ" required> 
            
        </div>
        </div>
        <div class="row">
        <div class="col-md-2">
            <label for="year">เข้าปีการศึกษา</label>
            <input type="text" class="form-control" name="year" id="year" value = "25<?=substr("{{$users ->first()->IDstudent}}",1,2)?>"readonly>
        </div>
        </div>
        </br>
        <h5 class="card-header">**เลือกหัวข้อที่ต้องการ**</h5>
        </br>

        <div class="form-check">
        <label><input  name="caseRadio[]" type="checkbox" value="ทำบัตรนักศึกษาใหม่"> กรณีที่ 1 ทำบัตรนักศึกษาใหม่</label>
        </div>
       
        
            
          <div class="form-check ทำบัตรนักศึกษาใหม่ box">
          <div class="form-inline" >
            <p> อัพโหลด รูปถ่าย(รูปชุดนักศึกษา) </p> &emsp; <p  class="text-danger"><strong> **เฉพาะไฟล์ รูปภาพ **</strong></p>
            </div>
            <div class="col-md-5">
            <input type="file" class="form-control" name="image" id="image" ></br>
            </div>
            <div class="form-inline" >
            <p> อัพโหลด สำเนาบัตรประชาชน </p> &emsp; <p  class="text-danger"><strong> **เฉพาะไฟล์ PDF **</strong></p>
            </div>
            <div class="col-md-5">
            <input type="file" class="form-control" name="id_card1" id="id_card1" ></br>
            </div>
        </div>

        <div class="form-check">
        <label><input  name="caseRadio[]" type="checkbox" value="เปลี่ยนชื่อ-สกุล"> กรณีที่ 2 เปลี่ยนชื่อ-สกุล</label>
        </div>

        <div class="form-check เปลี่ยนชื่อ-สกุล box">
        <div class="form-inline" >
        
            <p> อัพโหลด สำเนาบัตรประชาชน </p>  &emsp; <p  class="text-danger"><strong> **เฉพาะไฟล์ PDF **</strong></p>
            </div>
            <div class="col-md-5">
            <input type="file" class="form-control" name="id_card2" id="id_card2" ></br>
            </div>
            <div class="form-inline" >
            <p> อัพโหลด สำเนาหลักฐานการเปลี่ยนชื่อ-สกุล</p>  &emsp; <p  class="text-danger"><strong> **เฉพาะไฟล์ PDF **</strong></p>
            </div>
            <div class="col-md-5">
            <input type="file" class="form-control" name="change_name" id="change_name" >
            </div>
        </div>
        </br>
        </br>
        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
    </form>
    </div>
    </div>
    </div>
  </div>
  
  <script>
$.Thailand({
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});
</script>

  <script>
$(document).ready(function(){
  console.log("HELLO");
  showProvinces();
});
</script>
<script>
function ajax(url, callback){
  $.ajax({
    "url" : url,
    "type" : "GET",
    "dataType" : "json",
  })
  .done(callback); 
}
</script>
<script>
function showProvinces(){
  //PARAMETERS
  var url = "{{ url('/') }}/api/province";
  var callback = function(result){
    $("#input_province").empty();
    for(var i=0; i<result.length; i++){
      $("#input_province").append(
        $('<option></option>')
          .attr("value", ""+result[i].province_code)
          
          .html(""+result[i].province)
      );
    }
    showAmphoes();
  };
  //CALL AJAX
  ajax(url,callback);
}
function showAmphoes(){
  //INPUT
  var province_code = $("#input_province").val();
  //PARAMETERS
  var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe";
  var callback = function(result){
    //console.log(result);
    $("#input_amphoe").empty();
    for(var i=0; i<result.length; i++){
      $("#input_amphoe").append(
        $('<option></option>')
          .attr("value", ""+result[i].amphoe_code)
          .html(""+result[i].amphoe)
      );
    }
    showDistricts();
  };
  //CALL AJAX
  ajax(url,callback);
}
function showDistricts(){
  //INPUT
  var province_code = $("#input_province").val();
  var amphoe_code = $("#input_amphoe").val();
  //PARAMETERS
  var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/createpetition/petition04";
  var callback = function(result){
    //console.log(result);
    $("#input_district").empty();
    for(var i=0; i<result.length; i++){
      $("#input_district").append(
        $('<option></option>')
          .attr("value", ""+result[i].district_code)
          .html(""+result[i].district)
      );
    }
    showZipcode();
  };
  //CALL AJAX
  ajax(url,callback);
}
function showZipcode(){
  //INPUT
  var province_code = $("#input_province").val();
  var amphoe_code = $("#input_amphoe").val();
  var district_code = $("#input_district").val();
  //PARAMETERS
  var url = "{{ url('/') }}/api/province/"+province_code+"/amphoe/"+amphoe_code+"/createpetition/petition04/"+district_code;
  var callback = function(result){
    //console.log(result);
    for(var i=0; i<result.length; i++){
      $("#input_zipcode").val(result[i].zipcode);
    }
  };
  //CALL AJAX
  ajax(url,callback);
}
</script>
  @endsection
