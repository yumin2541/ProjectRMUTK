@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ยินดีต้อนรับ</div>
                
                <div class="card-body">

                <form action="" class="form-inline">
                    <input type="text" name="q" class="form-control form-control-sm" placeholder="">
                    <button type="submit" class="btn btn-primary btn-sm">ค้นหา</button>
                </form>
                </br>
                        <table class="table">
                            <thead>
                            
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">role</th>
                                <th scope="col">
                                
                                    <div class="dropdown show">
                                    
                                    <a class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        สถานะ (Teacher)
                                    </a>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item" href="/admin/users">All</a>
                                        <a class="dropdown-item" href="/admin/users/1">Admin</a>
                                        <a class="dropdown-item" href="/admin/users/2">Teacher</a>
                                        <a class="dropdown-item" href="/admin/users/3">Student</a>
                                        
                                    </div>
                                    
                                </th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user ->id}}</th>
                                <td>{{$user ->name}}</td>
                                <td>{{$user ->email}}</td>
                                <td>{{ implode(', ', $user ->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                
                                <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn btn-primary btn-sm float-left">แก้ไข</button>
                                
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post" class = "float-left">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-warning">ลบ</button>
                                </td>
                                </form>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
