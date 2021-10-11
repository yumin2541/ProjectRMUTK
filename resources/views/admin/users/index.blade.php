@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">รายชื่อผู้มีสิทธิเข้าใช้งานระบบ</div>
                
                <div class="card-body">

               
                </br>
                        <table class="table">
                            <thead>
                            
                                <tr>
                                
                                
                                <th scope="col">ชื่อบัญชีผู้ใช้</th>
                                <th scope="col">อีเมล</th>
                                <th scope="col">
                                
                                    <div class="dropdown show">
                                    
                                    <a class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        สถานะ
                                    </a>

                                    
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item" href="/admin/users">All</a>
                                        <a class="dropdown-item" href="/admin/users/3">Student</a>
                                        <a class="dropdown-item" href="/admin/users/1">Admin</a>
                                        <a class="dropdown-item" href="/admin/users/2">Teacher</a>
                                        <a class="dropdown-item" href="/admin/users/4">HeadTeacher</a>
                                        <a class="dropdown-item" href="/admin/users/5">Dean</a>

                                    </div>
                                    
                                </th>
                                <th scope="col">แก้ไข/ลบ</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                            <tr>
                              
                                <td>{{$user ->name}}</td>
                                <td>{{$user ->email}}</td>
                                <td>{{ implode(', ', $user ->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                
                                <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn btn-primary  float-left">แก้ไข</button>
                                
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post" class = "float-left">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-warning deleteform">ลบ</button>
                                </td>
                                </form>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            {{$users->links()}} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
