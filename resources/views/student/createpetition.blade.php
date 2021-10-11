@extends('layouts.admin')
@section('body')
<div class="table-responsive">
    <h2>เขียนใบคำร้อง</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">เลือกคำร้องที่ต้องการ</label>
            <div class="links">
                        <a href="{{ route('petition01') }}">สวท.01 ใบคำร้องทั่วไป</a><br />
                        <a href="{{ route('petition02') }}">สวท.02 ใบคำร้องขอหนังสือรับรองและใบรายงานผลการศึกษา (นักศึกษาปัจจุบัน)</a><br />
                        <a href="{{ route('petition03') }}">สวท.03 ใบคำร้องขอหนังสือรับรองและใบรายงาน (ผู้สำเร็จการศึกษา)</a><br />
                        <a href="{{ route('petition04') }}">สวท.04 ใบขอเปลี่ยนชื่อนามสกุลและทำบัตร</a><br />
                        <a href="{{ route('petition05') }}">สวท.05 ใบคำร้องขอลาพัก</a><br />
                        <a href="{{ route('petition06') }}">สวท.06 ใบคำร้องรักษาสภาพ</a><br />
                        <a href="{{ route('petition07') }}">สวท.07 ใบคำร้องขอลาออก</a><br />
                        <a href="{{ route('petition08') }}">สวท.08 ใบคำร้องขอคืนสภาพ_กลับเข้าศึกษา</a><br />
                        
            </div>    
        </div>
    </form>
</div>

@endsection