@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
            
                <blockquote class="blockquote text-center">
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
        
                
                        <dt class="col-sm-3">มีความประสงค์</dt>
                        <dd class="col-sm-9">ขอรักษาสภาพการเป็นนักศึกษา (นักศึกษาตกค้าง)</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">ในภาคการศึกษาที่ {{$show06 ->Sec }} ปี การศึกษา {{$show06 ->Startyear_case }}
                        <dt class="col-sm-3">เนื่องจาก</dt>
                        <dd class="col-sm-9">{{$show06 ->Because}}
                    
                        
                        </br></br><a  href="{{asset('storage')}}/file_check/{{$show06->File_check}}"   class="btn btn-success btn-sm" >แสดงสำเนาใบเสร็จรับเงินค่ารักษาสภาพการเป็นนักศึกษา</a> </dd>
                </dl>

              

               


                </br></br>
                        @can('dean-users')
                        <a href="{{ route('histroypetition3') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                        @endcan
                        @can('headteacher-users')
                        <a href="{{ route('histroypetition2') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                        @endcan
                        @can('teacher-users')
                        <a href="{{ route('histroypetition') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                        @endcan
                        @can('student-users')
                        <a href="{{ route('status') }}" class="btn btn-primary btn-lg active">ย้อนกลับ</a>
                        @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
