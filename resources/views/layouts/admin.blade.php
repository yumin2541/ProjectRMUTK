<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ระบบยื่นคำร้องออนไลน์</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
    <script src="{{ asset('js/alert.js') }}" defer></script>
    <script src="{{ asset('js/submit.js') }}"defer></script>

    <img src="http://www.ascar.rmutk.ac.th/system/wp-content/uploads/2020/06/cropped-Header-Ascar-01.jpg" width="1350" height="100"/>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-dark text-white border-bottom shadow-sm">
  
    @can('manage-users')
    <h5 class="my-0 mr-md-auto font-weight-normal">ระบบยื่นคำร้องออนไลน์ (ผู้ดูแลระบบ)</h5>
    @endcan
    @can('teacher-users')
    <h5 class="my-0 mr-md-auto font-weight-normal">ระบบยื่นคำร้องออนไลน์ (อาจารย์)</h5>
    @endcan
    @can('student-users')
    <h5 class="my-0 mr-md-auto font-weight-normal">ระบบยื่นคำร้องออนไลน์ (นักศึกษา)</h5>
    @endcan
    @can('headteacher-users')
    <h5 class="my-0 mr-md-auto font-weight-normal">ระบบยื่นคำร้องออนไลน์ (หัวหน้าสาขา)</h5>
    @endcan
    @can('dean-users')
    <h5 class="my-0 mr-md-auto font-weight-normal">ระบบยื่นคำร้องออนไลน์ (คณบดี)</h5>
    @endcan
    @can('register-users')
    <h5 class="my-0 mr-md-auto font-weight-normal">ระบบยื่นคำร้องออนไลน์ (เจ้าหน้าที่ทะเบียน)</h5>
    @endcan
    
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-white" href="{{ route('home') }}">Home</a>
      @can('student-users')
      <a class="p-2 text-white" href="{{ route('profile') }}">Profile</a>
      @endcan
      @can('teacher-users')
      <a class="p-2 text-white" href="{{ route('profile2') }}">Profile</a>
      @endcan
      @can('headteacher-users')
      <a class="p-2 text-white" href="{{ route('profile2') }}">Profile</a>
      @endcan
      @can('dean-users')
      <a class="p-2 text-white" href="{{ route('profile2') }}">Profile</a>
      @endcan
      @can('register-users')
      <a class="p-2 text-white" href="{{ route('profile2') }}">Profile</a>
      @endcan
    </nav>
    
            <div class="dropdown show">
        <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                   @can('manage-users')
                                    <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                        ระบบจัดการข้อมูล
                                    </a>
                                    @endcan
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
        </div>
  </div>
  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">

    <div class="text-dark">
    <div class="card-body">เมนู</div>
  </div>
      <div class="list-group list-group-flush">
      @can('manage-users')
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action bg-light">จัดการข้อมูลผู้ใช้ระบบ</a>
        <a href="{{ route('importcsv') }}" class="list-group-item list-group-item-action bg-light">นำเข้าข้อมูลนักศึกษา</a>
        <a href="{{ route('importcsv2') }}" class="list-group-item list-group-item-action bg-light">นำเข้าข้อมูลผู้อนุมัติ</a>
        <a href="{{ route('report') }}" class="list-group-item list-group-item-action bg-light">ประวัติการขอคำร้องทั้งหมด</a>
        @endcan
        @can('student-users')
        <a href="{{ route('createpetition') }}" class="list-group-item list-group-item-action bg-light">เขียนคำร้อง</a>
        <a href="{{ route('status') }}" class="list-group-item list-group-item-action bg-light">ติดตามสถานะคำร้อง</a>
        @endcan
        @can('teacher-users')
        <a href="{{ route('histroypetition') }}" class="list-group-item list-group-item-action bg-light">ประวัติการขอคำร้อง</a>
        @endcan
        @can('headteacher-users')
        <a href="{{ route('histroypetition2') }}" class="list-group-item list-group-item-action bg-light">ประวัติการขอคำร้อง</a>
        @endcan
        @can('dean-users')
        <a href="{{ route('histroypetition3') }}" class="list-group-item list-group-item-action bg-light">ประวัติการขอคำร้อง</a>
        @endcan
        @can('register-users')
        <a href="{{ route('histroypetition4') }}" class="list-group-item list-group-item-action bg-light">ประวัติการขอคำร้อง</a>
        @endcan
      </div>
    </div>
    <div id="page-content-wrapper">
      <div class="container-fluid">
        @yield('body')
    </div>
  </div>
</body>
</html>
