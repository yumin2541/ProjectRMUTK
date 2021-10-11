@extends('layouts.admin')

@section('body')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
            
                <blockquote class="blockquote text-center">
                    <p class="mb-0">สวท.04 ใบขอเปลี่ยนชื่อนามสกุลและทำบัตร</p>
                    
                </blockquote>
                <dl class="row">
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show04 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show04 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล</dt>
                        <dd class="col-sm-9">{{$show04 ->studentcsv->Titlename}} {{$show04 ->studentcsv->Fname}} {{$show04 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show04 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show04 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show04 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show04 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เลขประจำตัวประชาชน</dt>
                        <dd class="col-sm-9">{{$show04 ->IDcard}}</dd>
                        <dt class="col-sm-3">วันเกิด</dt>
                        <dd class="col-sm-9">{{$show04 ->Birthday}}</dd>
                        <dt class="col-sm-3">เพศ</dt>
                        <dd class="col-sm-9">{{$show04 ->Sex}}</dd>
                        <dt class="col-sm-3">สัญชาติ</dt>
                        <dd class="col-sm-9">{{$show04 ->Nationality}}</dd>
                        <dt class="col-sm-3">มีความประสงค์</dt>
                        <dd class="col-sm-9">{{$show04 ->Case_radio}}</br>
                   
                        @if($show04->Case_radio  == 'ทำบัตรนักศึกษาใหม่')
                        </br><a  href="#addnew" data-toggle="modal"  class="btn btn-success btn-sm" >แสดงรูปภาพ</a> 
                        <a href="{{asset('storage')}}/idcard04_card/{{$show04->Docidcard_case1}}" class="btn btn-success btn-sm" >แสดงสำเนาบัตรประชาชาน</a></dd> 
                        @elseif($show04->Case_radio  == 'เปลี่ยนชื่อ-สกุล')
                        </br><a href="{{asset('storage')}}/idcard04_name/{{$show04->Docidcard_case2}}" class="btn btn-success btn-sm" >แสดงสำเนาบัตรประชาชาน</a> 
                        <a href="{{asset('storage')}}/docname/{{$show04->Docname_case2}}" class="btn btn-success btn-sm" >แสดงสำเนาหลักฐานการเปลี่ยนชื่อ-สกุล</a></dd> 
                        @elseif($show04->Case_radio  == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล')
                        </br><a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm" >แสดงรูปภาพ</a> 
                        <a href="{{asset('storage')}}/idcard04_card/{{$show04->Docidcard_case1}}" class="btn btn-success btn-sm" >แสดงสำเนาบัตรประชาชาน</a></br>
                        </br><a href="{{asset('storage')}}/idcard04_name/{{$show04->Docidcard_case2}}" class="btn btn-success btn-sm" >แสดงสำเนาบัตรประชาชาน(สำหรับการเปลี่ยนชื่อ)</a> </br></br>
                        <a href="{{asset('storage')}}/docname/{{$show04->Docname_case2}}" class="btn btn-success btn-sm" >แสดงสำเนาหลักฐานการเปลี่ยนชื่อ-สกุล</a></dd>
                        @endif
                       
                </dl>
                </br>
                <h3 align="center">
                     **รายละเอียดที่อยู่**
                </h3>
                </br>
                <dl class="row">
                        <dt class="col-sm-3">ที่อยู่ปัจจุบัน</dt>
                        <dd class="col-sm-9"><strong>เลขที่ :</strong>   {{$show04 ->House_number}}   <strong>หมู่บ้าน/อาคาร :</strong> {{$show04 ->Building}}
                        <strong>ชั้น :</strong> {{$show04 ->Floor}} <strong>หมู่ :</strong> {{$show04 ->Moo}} <strong>ซอย :</strong> {{$show04 ->Soi}} 
                        </br><strong>ถนน :</strong> {{$show04 ->Street}} <strong>แขวง/ตำบล :</strong> {{$show04 ->District}}
                        </br><strong>เขต/อำเภอ :</strong> {{$show04 ->County}} <strong>จังหวัด :</strong> {{$show04 ->Province}} <strong>รหัสไปรษณีย์ :</strong> {{$show04 ->Postal_code}}
                        </br><strong>โทรศัพท์ :</strong> {{$show04 ->Tel}} 
                        </br><strong>โทรศัพท์มือถือ :</strong> {{$show04 ->Tel_mobile}} 
                        </br><strong>เข้าปีการศึกษา :</strong> {{$show04 ->Year}}
                        </dd>
                    
                </dl>

                        </br>
                        @can('register-users')
                        <a href="{{ route('histroypetition4') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                        @endcan
                        @can('student-users')
                        <a href="{{ route('status') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                        @endcan
                </div>
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

@endsection
@include('model/img_student')
