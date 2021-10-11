@extends('layouts.admin')
@section('body')
<div class="table-responsive">
    <h2>ประวัติการขอคำร้อง</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ตารางการขอคำร้อง</label>
            
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">คำร้อง</th>
                            <th scope="col">จำนวนคำร้องที่รออนุมัติ</th>
                            <th scope="col">จำนวนคำร้องที่อนุมัติ</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($datas  as $data)
          
                            <tr>
                                <td>{{$data ->name}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>  
                        
    </form>
    

    
</div>



@endsection