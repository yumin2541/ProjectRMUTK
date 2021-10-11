@extends('layouts.admin')

@section('body')


     
     <div class="card-header"><strong>นำเข้าข้อมูลนักศึกษา</strong></div>
    </br>
    <p class="text-danger"><strong>*สามารถอัพโหลดได้เฉพาะไฟล์ .CSV</strong></p>
     <!-- Form -->
     <form method='post' action='/uploadFile' enctype='multipart/form-data' >
       {{ csrf_field() }}
             <!-- Message -->
     @if(Session::has('message'))
     <div class="alert alert-danger">
        <p >{{ Session::get('message') }}</p>
      </div>
     @endif
       <div class="form-inline" >
       <input type="file" class="form-control"  name='file' required>
       &emsp;&emsp;
       <input type='submit' name='submit' value='นำเข้าข้อมูล' class="btn btn-success">
    
       </div>
     </form>
      </br>

     <form action="" method="post">
        <div class = "table-responsive my-2">
        <table class="table table-sm">
          <thead>
            <tr>
             
              <th scope="col">รหัสนักศึกษา</th>
              <th scope="col">ชื่อ-นามสกุล</th>
              <th scope="col">ชื่อ-นามสกุล (Eng)</th>
              <th scope="col">สาขา</th>
              <th scope="col">คณะ</th>
              <th scope="col">หลักสูตร</th>
              <th scope="col">ที่ปรึกษา</th>
              <th scope="col">สถานะ</th>
              <th scope="col">อีเมล</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
          <tr>
                      
                      <td>{{$user ->IDstudent}}</td>
                      <td>{{$user ->Titlename}} {{$user ->Fname}} {{$user ->Lname}}</td>
                      <td>{{$user ->Titlename_eng}} {{$user ->Fname_eng}} {{$user ->Lname_eng}}</td>
                      <td>{{$user ->Major}}</td>
                      <td>{{$user ->Faculty}}</td>
                      <td>{{$user ->course}}</td>
                      <td>{{$user->teacher->name}} {{$user->teacher->Fname}} {{$user->teacher->Lname}}</td>
                      <td>{{$user ->Status}}</td>
                      <td>{{$user ->Mail}}</td>
          </tr>
          @endforeach
          </tbody>
          </table>
          {{$users->links()}} 
  </body>
  @endsection
