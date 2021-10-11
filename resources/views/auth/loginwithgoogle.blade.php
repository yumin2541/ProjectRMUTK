@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('เข้าสู่ระบบ') }}</div>

                <div class="card-body">
                <div class="row justify-content-center">
                <img src="https://www.rmutk.ac.th/wp-content/uploads/2017/10/cropped-UTK-LOGO-1.png" width="250" height="100"/>
                </div>
                <div class="row justify-content-center">
                <h3>ระบบยื่นคำร้องออนไลน์</h3>
        
                </div>

                </br>
                             <div class="row justify-content-center">
                           
                            <a href="{{ url('/auth/redirect/google') }}"  class="btn btn-danger btn-lg">
                                  <strong>Login With Google</strong>
                                </a>
                            </div>
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
