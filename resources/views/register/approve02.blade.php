@extends('layouts.admin')

@section('body')


<link href="{{ asset('dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
<script src="{{ asset('dist/js/bootstrap-datepicker-custom.js') }}"></script>
<script src= "{{ asset('dist/locales/bootstrap-datepicker.th.min.js') }} "charset="UTF-8"></script>

<script>

var currDate = new Date();
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate : currDate,
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            }).datepicker("setDate", "+7d"); 
       
        });
</script>
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">นัดหมายรับเอกสาร  </div>
                
                
                <div class="card-body">
                <form action="/form02update4/{{$shows ->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <p class="h5">วันที่ทำการอนุมัติ : <?=thaidate('j F พ.ศ.Y');?> </p>
                <div class="col-md-8">
                    <label for="name">*กรอกเลขรับเอกสาร</label>
                    <input class="form-control" name="idpickup"  id="" required></input>
                     </div>
                     </br>
               
                    <div class="col-md-8">
                    <label for="name">*กรอกวันนัดหมายรับเอกสาร (ระบบตั้งวันนัดไว้ภายใน 7 วัน ทำการ)</label>
                    <input id="inputdatepicker" class="datepicker form-control" name="datepickup" data-date-format="mm/dd/yyyy">
                    </br>
                    </div>
                    <div class="col-md-8">
                    <label for="name">ลงนาม</label>
                    <input class="form-control" name="sig_register"  value = "{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly></input>
                     </div>
                    </br>
                        <button type="submit" name="submit" class="btn btn-success">อนุมัติ</button>
                </form> 
                       
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
<script >
    
</script> 
@endsection
