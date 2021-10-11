@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
            
                <blockquote class="blockquote text-center">
                    <p class="mb-0">สวท.05 ใบคำร้องขอลาพัก</p>
                </blockquote>
                    <dl class="row">
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show05 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show05 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล</dt>
                        <dd class="col-sm-9">{{$show05 ->studentcsv->Titlename}} {{$show05 ->studentcsv->Fname}} {{$show05 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show05 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show05 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show05 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show05 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เบอร์โทรที่ติดต่อได้</dt>
                        <dd class="col-sm-9">{{$show05 ->Phone}}</dd>
                    </dl>

                    </br>
                    <hr>
                <p class="mb-0">
                 - เข้าปีการศึกษา {{$show05 ->Startyear}} มีความประสงค์ขอลาพักการศึกษาในภาคการศึกษาที่ {{$show05 ->Sec}} ปีการศึกษา {{$show05 ->Schoolyear}}
                </p>
                </br></br>
                <dl class="row">

                        @if($show05 ->Case_radio == 'มากกว่า1ครั้ง')
                        <dt class="col-sm-3">จำนวนครั้งที่ลา</dt>
                        <dd class="col-sm-9">ครั้งที่ {{$show05 ->Numstay}} โดยคร้ังก่อนได้ลาพักในภาคการศึกษาที่ {{$show05 ->Secstay}} ปีการศึกษา {{$show05 ->Yearstay}}</dd>
                        
                        @else
                        <dt class="col-sm-3">จำนวนครั้งที่ลา</dt>
                        <dd class="col-sm-9">{{$show05 ->Case_radio}}</dd>
                        @endif
                        <dt class="col-sm-3">เหตุผล</dt>
                        <dd class="col-sm-9">{{$show05 ->Reason}}
                        </br></br><a  href="{{asset('storage')}}/file_05/{{$show05->File_stay}}"   class="btn btn-success btn-sm" >แสดงเอกสารหลักฐานที่เกี่ยวข้องกับการขอลาพักการเรียน</a> </dd>
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
