@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
                
                <form action="/form04/noapprove4/Advice/{{$show04 ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <blockquote class="blockquote text-center">
                    <p class="mb-0">พนักงานฝ่ายทะเบียน</p>
                    <p class="mb-0">สวท.04</p>
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
                        @can('register-users')
                        @if($show04->Case_radio  == 'ทำบัตรนักศึกษาใหม่')
                        </br><a  href="#addnew" data-toggle="modal"  class="btn btn-success btn-sm" >ดูรูปภาพ</a> 
                        <a href="{{asset('storage')}}/idcard04_card/{{$show04->Docidcard_case1}}" class="btn btn-success btn-sm" >ดูสำเนาบัตรประชาชาน</a></dd> 
                        @elseif($show04->Case_radio  == 'เปลี่ยนชื่อ-สกุล')
                        </br><a href="{{asset('storage')}}/idcard04_name/{{$show04->Docidcard_case2}}" class="btn btn-success btn-sm" >ดูสำเนาบัตรประชาชาน</a> 
                        <a href="{{asset('storage')}}/docname/{{$show04->Docname_case2}}" class="btn btn-success btn-sm" >ดูสำเนาหลักฐานการเปลี่ยนชื่อ-สกุล</a></dd> 
                        @elseif($show04->Case_radio  == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล')
                        </br><a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm" >ดูรูปภาพ</a> 
                        <a href="{{asset('storage')}}/idcard04_card/{{$show04->Docidcard_case1}}" class="btn btn-success btn-sm" >ดูสำเนาบัตรประชาชาน</a></br>
                        </br><a href="{{asset('storage')}}/idcard04_name/{{$show04->Docidcard_case2}}" class="btn btn-success btn-sm" >ดูสำเนาบัตรประชาชาน(สำหรับการเปลี่ยนชื่อ)</a> </br></br>
                        <a href="{{asset('storage')}}/docname/{{$show04->Docname_case2}}" class="btn btn-success btn-sm" >ดูสำเนาหลักฐานการเปลี่ยนชื่อ-สกุล</a></dd>
                        @endif
                        @endcan
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

                        <div class="form-group">
                        <p class="text-danger"><strong>*กรอกคำแนะนำว่าเหตุใดจึงไม่สามารถอนุมัติคำร้องได้</strong></p>
                        <textarea class="form-control" name="advice" rows="5" id="comment" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
                    </form>  
                    <br>
                    
                    
                       
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
@endsection
@include('model/img_student')