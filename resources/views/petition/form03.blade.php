@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
            
                <blockquote class="blockquote text-center">
                    <p class="mb-0">สวท.03 ใบคำร้องขอหนังสือรับรองและใบรายงาน (ผู้สำเร็จการศึกษา)</p>
                   
                   
                    </br><img src="{{asset('storage')}}/student_image/{{$show03->Image}}" alt="" width="200px" height="250px">
                    
                </blockquote>
                @can('register-users')
                <blockquote class="blockquote text-center">
                <a href="{{ route('download_img03',$show03->id) }}" class="btn btn-success btn-sm">ดาวน์โหลดรูปภาพ</a>
                </blockquote>
                @endcan
          
                </br>
                    <dl class="row">
                    
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show03 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show03 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล (ภาษาไทย)</dt>
                        <dd class="col-sm-9">{{$show03 ->studentcsv->Titlename}} {{$show03 ->studentcsv->Fname}} {{$show03 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล (ภาษาอังกฤษ)</dt>
                        <dd class="col-sm-9">{{$show03 ->studentcsv->Titlename_eng}} {{$show03 ->studentcsv->Fname_eng}} {{$show03 ->studentcsv->Lname_eng}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show03 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show03 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show03 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show03 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เบอร์โทรศัพท์ที่ติดต่อได้</dt>
                        <dd class="col-sm-9">{{$show03 ->Phone}}</dd>
                        <dt class="col-sm-3">ระดับปริญญา</dt>
                        <dd class="col-sm-9">{{$show03 ->Degree}}</dd>
                        <dt class="col-sm-3">ระดับประกาศนียบัตร</dt>
                        <dd class="col-sm-9">{{$show03 ->Cert}}</dd>
                        <dt class="col-sm-3">หัวข้อที่ต้องการ</dt>
                        <dd class="col-sm-9">{{$show03 ->Case_radio}}</dd>
                        @if($show03->Case_radio  == 'ขอหนังสือรับรอง')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอหนังสือรับรอง**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case1}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case1}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show03 ->CertTH_case1 + $show03 ->CertEN_case1) * 50}}   บาท</dd>
                        @elseif($show03->Case_radio  == 'ขอใบรายงานผลการศึกษา')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบรายงานผลการศึกษา**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case2}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case2}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show03 ->CertTH_case2 + $show03 ->CertEN_case2) * 50}}   บาท</dd>
                        @elseif($show03->Case_radio  == 'ขอใบแทนปริญญาบัตร')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบแทนปริญญาบัตร**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case3}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show03 ->CertEN_case3) * 500}}   บาท</dd>
                        @elseif($show03->Case_radio  == 'ขอหนังสือรับรอง,ขอใบรายงานผลการศึกษา')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอหนังสือรับรอง**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case1}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case1}}    ชุด</dd>
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบรายงานผลการศึกษา**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case2}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case2}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{($show03 ->CertTH_case2 + $show03 ->CertEN_case2 + $show03 ->CertTH_case1 + $show03 ->CertEN_case1) * 50}}   บาท</dd>
                        @elseif($show03->Case_radio  == 'ขอหนังสือรับรอง,ขอใบแทนปริญญาบัตร')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอหนังสือรับรอง**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case1}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case1}}    ชุด</dd>
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบแทนปริญญาบัตร**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case3}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{(($show03 ->CertEN_case3) * 500) + ($show03 ->CertTH_case1 + $show03 ->CertEN_case1) * 50}}   บาท</dd>
                        @elseif($show03->Case_radio  == 'ขอใบรายงานผลการศึกษา,ขอใบแทนปริญญาบัตร')
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบรายงานผลการศึกษา**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case2}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case2}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบแทนปริญญาบัตร**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case3}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{(($show03 ->CertEN_case3) * 500) + ($show03 ->CertTH_case2 + $show03 ->CertEN_case2) * 50}}   บาท</dd>
                        @elseif($show03->Case_radio  == 'ขอหนังสือรับรอง,ขอใบรายงานผลการศึกษา,ขอใบแทนปริญญาบัตร')
                        </br></br>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอหนังสือรับรอง**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case1}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case1}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบรายงานผลการศึกษา**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertTH_case2}}    ชุด</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case2}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">
                            <dl class="row">
                            <dt class="col-sm-8"><h4>**ขอใบแทนปริญญาบัตร**</h4></dt>
        
                            </dl>
                        </dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show03 ->CertEN_case3}}    ชุด</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9"></dd>
                        <dt class="col-sm-3">คิดเป็นจำนวนเงิน</dt>
                        <dd class="col-sm-9">{{(($show03 ->CertEN_case3) * 500) + (($show03 ->CertTH_case2 + $show03 ->CertEN_case2) * 50)+(($show03 ->CertTH_case1 + $show03 ->CertEN_case1) * 50)}}   บาท</dd>
                        @endif

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
@endsection
