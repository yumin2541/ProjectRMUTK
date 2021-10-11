@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดการอนุมัติ</div>
                
                
                <div class="card-body">
                
                <form action="/form01update3/{{$shows ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <p class="h5">วันที่ทำการอนุมัติ : <?=thaidate('j F พ.ศ.Y');?> </p>
                    <div class="col-md-8">
                    <label for="name">*เขียนรายละเอียดการอนุมัติ</label>
                    <textarea class="form-control" name="advice_dean" rows="5" id="" required></textarea>
                     </div>
             
               
                    <div class="col-md-8">
                    <label for="name">ลงชื่อ</label>
                    <input type="text" class="form-control" name="sige_dean" id="" value = "{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly>
                    </div>
                    </br>
                        <button type="submit" name="submit" class="btn btn-success">อนุมัติ</button>
                    </form>  
                    
                       
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
@endsection
