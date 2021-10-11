@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
            
                <blockquote class="blockquote text-center">
                    <p class="mb-0">สวท.07 ใบคำร้องขอลาออก</p>
                </blockquote>
                    <dl class="row">
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show07 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show07 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล</dt>
                        <dd class="col-sm-9">{{$show07 ->studentcsv->Titlename}} {{$show07 ->studentcsv->Fname}} {{$show07 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show07 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show07 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show07 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show07 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เบอร์โทรที่ติดต่อได้</dt>
                        <dd class="col-sm-9">{{$show07 ->Phone}}</dd>
                        <dt class="col-sm-3">เข้าปีการศึกษา</dt>
                        <dd class="col-sm-9">{{$show07 ->Startyear }}</dd>
                        <dt class="col-sm-3">มีความประสงค์</dt>
                        <dd class="col-sm-9">ขอลาออกจากการเป็นนักศึกษา</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">ในภาคการศึกษาที่ {{$show07 ->Sec}} ปี การศึกษา {{$show07 ->Year}}
                        <dt class="col-sm-3">เนื่องจาก</dt>
                        <dd class="col-sm-9">{{$show07 ->Because}}
                        
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
