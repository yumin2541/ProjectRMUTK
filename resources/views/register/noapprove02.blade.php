@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดคำร้อง  </div>
                
                
                <div class="card-body">
                
                <form action="/form02/noapprove4/Advice/{{$show02 ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <blockquote class="blockquote text-center">
                    <p class="mb-0">พนักงานฝ่ายทะเบียน</p>
                    <p class="mb-0">สวท.02</p>
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
                        <dt class="col-sm-3">สถานะนักศึกษา</dt>
                        <dd class="col-sm-9">{{$show02 ->Status_case1}}</dd>
                        <dt class="col-sm-3">นำไปใช้เพื่อ</dt>
                        <dd class="col-sm-9">{{$show02 ->For_case1}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertTH_case1}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertEN_case1}}</dd>
                        @else
                        <dt class="col-sm-3">นำไปใช้เพื่อ</dt>
                        <dd class="col-sm-9">{{$show02 ->For_case2}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาไทยเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertTH_case2}}</dd>
                        <dt class="col-sm-3">ฉบับภาษาอังกฤษเป็นจำนวน</dt>
                        <dd class="col-sm-9">{{$show02 ->CertEN_case2}}</dd>
                        @endif

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
