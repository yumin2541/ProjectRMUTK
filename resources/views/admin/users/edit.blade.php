@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">แก้ไขข้อมูลผู้ใช้ {{$user ->name}}</div>

                <div class="card-body">

                <form action="{{ route('admin.users.update', $user) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    @foreach($roles as $role)
                    <div class="form-check">
                            <input type="radio" name= "roles[]" value="{{$role->id}}">
                            <lable>{{$role->name}}</lable>
                    </div>
                    @endforeach

                    <br>
                    <button type="sumbit" class ="btn btn-primary">
                        ยืนยัน
                    </button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
