@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
                
                <form action="/form06/noapprove/Advice/{{$show06 ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <blockquote class="blockquote text-center">
                    <p class="mb-0">อาจารย์ที่ปรึกษา</p>
                    <p class="mb-0">สวท.06 ใบคำร้องรักษาสภาพ</p>
                </blockquote>
                <dl class="row">
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show06 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show06 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล</dt>
                        <dd class="col-sm-9">{{$show06 ->studentcsv->Titlename}} {{$show06 ->studentcsv->Fname}} {{$show06 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show06 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show06 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show06 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show06 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เบอร์โทรที่ติดต่อได้</dt>
                        <dd class="col-sm-9">{{$show06 ->Phone}}</dd>
                    
                        <dt class="col-sm-3">เข้าปีการศึกษา</dt>
                        <dd class="col-sm-9">{{$show06 ->Startyear }}</dd>
        
                        @if($show06 ->Case_radio == 'นักศึกษาตกค้าง')
                        <dt class="col-sm-3">มีความประสงค์</dt>
                        <dd class="col-sm-9">ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาตกค้าง)</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">ในภาคการศึกษาที่ {{$show06 ->Sec }} ปี การศึกษา {{$show06 ->Startyear_case }}
                        <dt class="col-sm-3">เนื่องจาก</dt>
                        <dd class="col-sm-9">{{$show06 ->Because}}
                        @else
                        <dt class="col-sm-3">มีความประสงค์</dt>
                        <dd class="col-sm-9">ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาผลการเรียนไม่สมบูรณ์ I )</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">ในภาคการศึกษาที่ {{$show06 ->Sec }} ปี การศึกษา {{$show06 ->Startyear_case }}
                        <dt class="col-sm-3">เนื่องจาก</dt>
                        <dd class="col-sm-9">{{$show06 ->Because}}
                        @endif
                        </br></br><a  href="{{asset('storage')}}/file_check/{{$show06->File_check}}"   class="btn btn-success btn-sm" >ดูสำเนาใบเสร็จรับเงินค่ารักษาสภาพการเป็นนักศึกษา</a> </dd>
                        </dl>
            
                
                        <div class="form-group">
                        <p class="text-danger"><strong>*กรอกคำแนะนำว่าเหตุใดจึงไม่สามารถอนุมัติคำร้องได้</strong></p>
                        <textarea class="form-control" name="advice" rows="5" id="comment" required></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
                    </form>  
                    <br>
                    
                    
                        <a href="{{ route('histroypetition') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                       
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
@endsection
