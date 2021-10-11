@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ข้อมูลผู้ใช้ระบบ  </div>
                    

                <div class="card-body">
                </br>
                    <p><strong>บทบาท : <strong>{!! Auth::user()->roles->first()->name !!}</p>
                    <p><strong>ชื่อบัญชีผู้ใช้ : <strong>{!! Auth::user()->name !!}</p>
                    <p><strong>อีเมลที่เข้าสู่ระบบ : <strong>{!! Auth::user()->email !!}</p>
                    <p><strong>รหัสประจำตัวนักศึกษา : <strong>{{$users ->first()->IDstudent}}</p>
                    <p><strong>ชื่อ-นามสกุล : <strong>{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}</p>
                    
                    <p><strong>สาขา : <strong>{{$users ->first()->Major}}</p>
                    <p><strong>คณะ : <strong>{{$users ->first()->Faculty}}</p>
                    <p><strong>หลักสูตร : <strong>{{$users ->first()->course}}</p>
                    <p><strong>สถานะ : <strong>{{$users ->first()->Status}}</p>
                   
                </div>

            

                
            </div>
        </div>
    </div>
</div>
@endsection
