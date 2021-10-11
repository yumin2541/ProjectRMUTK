@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
                
                <form action="/form07/noapprove/Advice/{{$show07 ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <blockquote class="blockquote text-center">
                    <p class="mb-0">อาจารย์ที่ปรึกษา</p>
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
