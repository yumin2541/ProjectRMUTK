@extends('layouts.admin')

@section('body')

  <body>
   
    
     <div class="card-header"><strong>นำเข้าข้อมูลผู้อนุมัติ</strong></div>
    </br>
    <p class="text-danger"><strong>*สามารถอัพโหลดได้เฉพาะไฟล์ .CSV</strong></p>
     <!-- Form -->
     <form method='post' action='/uploadFile2' enctype='multipart/form-data' >
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
       
              <th scope="col">ชื่อ-นามสกุล</th>
              <th scope="col">อีเมล</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
          <tr>
                      
                      <td>{{$user ->Titlename}} {{$user ->Fname}} {{$user ->Lname}}</td>
                      <td>{{$user ->Mail}}</td>
          </tr>
          @endforeach
          </tbody>
          </table>
          {{$users->links()}} 
  </body>
  @endsection
