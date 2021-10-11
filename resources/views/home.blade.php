@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Homepage  </div>
                

                <div class="card-body">

                @if(Session::has('error'))
     <div class="alert alert-danger">
        <p >{{ Session::get('error') }}</p>
      </div>
     @endif

                ยินดีต้อนรับ
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
