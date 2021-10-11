@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
            
                <blockquote class="blockquote text-center">
                    <p class="mb-0">สวท.02 ใบคำร้องขอหนังสือรับรองและใบรายงานผลการศึกษา (นักศึกษาปัจจุบัน)</p>
                </blockquote>
                    <dl class="row">
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show02 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show02 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล (ภาษาไทย)</dt>
                        <dd class="col-sm-9">{{$show02 ->studentcsv->Titlename}} {{$show02 ->studentcsv->Fname}} {{$show02 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล (ภาษาอังกฤษ)</dt>
                        <dd class="col-sm-9">{{$show02 ->studentcsv->Titlename_eng}} {{$show02 ->studentcsv->Fname_eng}} {{$show02 ->studentcsv->Lname_eng}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show02 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show02 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show02 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show02 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เบอร์โทรศัพท์ที่ติดต่อได้</dt>
                        <dd class="col-sm-9">{{$show02 ->Phone}}</dd>
                        <dt class="col-sm-3">หัวข้อที่ต้องการ</dt>
                        <dd class="col-sm-9">{{$show02 ->Case_radio}}</dd>
                        @if($show02->Case_radio  == 'ขอหนังสือรับรอง')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอหนังสือรับรอง**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">สถานะนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show02 ->Status_case1}}</dd>
                        <dt class="col-sm-3">นำไปใช้เพื่อ</dt>
                        <dd class="col-sm-9">{{$show02 ->For_case1}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertTH_case1}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertEN_case1}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show02 ->CertTH_case1 + $show02 ->CertEN_case1) * 50}}   บาท</dd>
                        @elseif($show02->Case_radio  == 'ขอใบรายงานผลการศึกษา')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบรายงานผลการศึกษา**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">นำไปใช้เพื่อ</dt>
                        <dd class="col-sm-9">{{$show02 ->For_case2}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertTH_case2}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertEN_case2}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show02 ->CertTH_case2 + $show02 ->CertEN_case2) * 50}}   บาท</dd>
                        @else
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอหนังสือรับรอง**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">สถานะนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show02 ->Status_case1}}</dd>
                        <dt class="col-sm-3">นำไปใช้เพื่อ</dt>
                        <dd class="col-sm-9">{{$show02 ->For_case1}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertTH_case1}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertEN_case1}}    ชุด</dd>
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบรายงานผลการศึกษา**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">นำไปใช้เพื่อ</dt>
                        <dd class="col-sm-9">{{$show02 ->For_case2}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertTH_case2}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertEN_case2}}    ชุด</dd>
                   
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show02 ->CertTH_case1 + $show02 ->CertEN_case1 +$show02 ->CertEN_case2 +$show02 ->CertTH_case2) * 50}}   บาท</dd>
                        @endif
                     
                        


                        </dl>
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
@endsection
