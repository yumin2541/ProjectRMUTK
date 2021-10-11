@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
                
                <form action="/form08/noapprove/Advice/{{$show08 ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <blockquote class="blockquote text-center">
                    <p class="mb-0">อาจารย์ที่ปรึกษา</p>
                    <p class="mb-0">สวท.08 ใบคำร้องขอคืนสภาพ / กลับเข้าศึกษา</p>
                </blockquote>
                <dl class="row">
          
                        <dt class="col-sm-3">วันที่</dt>
                        <dd class="col-sm-9">{{$show08 ->Date}}</dd>
                        <dt class="col-sm-3">เรียน</dt>
                        <dd class="col-sm-9">{{$show08 ->Dear}}</dd>
                        <dt class="col-sm-3">ชื่อ-นามสกุล</dt>
                        <dd class="col-sm-9">{{$show08 ->studentcsv->Titlename}} {{$show08 ->studentcsv->Fname}} {{$show08 ->studentcsv->Lname}}</dd>
                        <dt class="col-sm-3">รหัสนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show08 ->studentcsv->IDstudent}}</dd>
                        <dt class="col-sm-3">สาขาวิชา</dt>
                        <dd class="col-sm-9">{{$show08 ->studentcsv->Major}}</dd>
                        <dt class="col-sm-3">คณะ</dt>
                        <dd class="col-sm-9">{{$show08 ->studentcsv->Faculty}}</dd>
                        <dt class="col-sm-3">หลักสูตร</dt>
                        <dd class="col-sm-9">{{$show08 ->studentcsv->course}}</dd>
                        <dt class="col-sm-3">เบอร์โทรที่ติดต่อได้</dt>
                        <dd class="col-sm-9">{{$show08 ->Phone}}</dd>
                        <dt class="col-sm-3">เข้าปีการศึกษา</dt>
                        <dd class="col-sm-9">{{$show08 ->Startyear }}</dd>
                        <dt class="col-sm-3">มีความประสงค์</dt>
                        @if($show08 ->Case_radio == 'ขอคืนสภาพ')
                        <dd class="col-sm-9">ขอคืนสภาพการเป็นนักศึกษาจากการถูกถอนชื่อออกจากการเป็นนักศึกษา</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">เนื่องจากไม่ได้ลงทะเบียนเรียนและไม่ขอลาพักการศึกษา
                        <br>
                        ในภาคการศึกษาที่ {{$show08 ->Sec_case1}} ปีการศึกษา {{$show08 ->Year_case1}}
                        </dd>
                        @else
                        <dd class="col-sm-9">ขอกลับเข้าศึกษาและลงทะเบียน</dd>
                        <dt class="col-sm-3"></dt>
                        <dd class="col-sm-9">ในภาคการศึกษาที่ {{$show08 ->Sec_case2}} ปีการศึกษา {{$show08 ->Year_case2}}
                        <br>
                        เนื่องจาก {{$show08 ->Because_case2}} เมื่อ ภาคการศึกษาที่ {{$show08 ->Secout_case2}} ปีการศึกษา {{$show08 ->Yearout_case2}}
                        </dd>
                        @endif
                        
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
