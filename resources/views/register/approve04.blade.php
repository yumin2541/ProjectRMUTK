@extends('layouts.admin')

@section('body')


<link href="{{ asset('dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
<script src="{{ asset('dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src= "{{ asset('dist/locales/bootstrap-datepicker.th.min.js') }} "charset="UTF-8"></script>

<script>

var currDate = new Date();
        $(document).ready(function () {
            $('.datepicker1').datepicker({
                format: 'dd/mm/yyyy',
                startDate : currDate,
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
       
        });
</script>

<script>
        $(document).ready(function () {
            $('.datepicker2').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "+5y");  //กำหนดเป็นวันปัจุบัน
        });
</script>
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">รายละเอียดการทำบัตร  </div>
                
                
                <div class="card-body">
                <form action="/form04update4card/{{$shows ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <p class="h5">วันที่ทำการอนุมัติ : <?=thaidate('j F พ.ศ.Y');?> </p>

                    
                <div class="col-md-8">
                    <label for="name">*กรอกสถานะนักศึกษา</label>
                    <input class="form-control" name="status_stu"  id="" required></input>
                     </div>
             
               
                    <div class="col-md-8">
                    <label for="name">*เลือกวันออกบัตร</label>
                    <input id="datepicker" class="datepicker1 form-control" name="daystart_card" data-date-format="mm/dd/yyyy">
                    
                    </br>
                    </div>
                    <div class="col-md-8">
                    <label for="name">*เลือกวันหมดอายุบัตร</label>
                    <input id="datepicker" class="datepicker2 form-control" name="dayend_card" data-date-format="mm/dd/yyyy">
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
