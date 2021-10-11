@extends('layouts.admin')
@section('body')
<div class="table-responsive">
    <h2>กำลังรออนุมัติคำร้อง</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ตารางการขอคำร้อง</label>
            
            @if($unions->count() < 1  )
            <br /><br />
                                <div class="alert alert-danger">
                                <p>ไม่มีคำร้องที่รออนุมัติ </p>
                                </div>
            
            @else 
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">คำร้อง</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เรื่อง</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">ผู้ยื่นคำร้อง</th>
                            <th scope="col">การอนุมันคำร้อง</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($unions as $union)
                        
                        <tr>
                        
                            
                            <td>{{$union->petition->name}}</td> 
                            <td>{{$union ->Date}}</td>
                            @if($union ->petition->name == 'สวท.01')
                            <td><a href="/form01/{{$union ->id}}">{{$union ->Header}}</a></td>
                           
                            
                            <td>{{$union->approve->name}} </td>
                            <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                            <td>
                            
                               
                            <div class="dropdown show">
                                <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   ----โปรดเลือก----
                                </button>
                                <div class="dropdown-menu dropdown">
                                    <a class="dropdown-item"  href="/indexapprove2/{{$union ->id}}" >อนุมัติคำร้อง</a>
                                    <a class="dropdown-item" href="/form01/noapprove2/{{$union ->id}}">ไม่อนุมัติคำร้อง</a>  
                                </div>
                               
                            
                            </td>
                            @elseif($union ->petition->name == 'สวท.05')
                            <td><a href="/form05/{{$union ->id}}">{{$union ->Header}}</a></td>
                           
                            
                            <td>{{$union->approve->name}} </td>
                            <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                            <td>
                            
                            <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item"  href="/form05update2/{{$union ->id}}" >อนุมัติคำร้อง</a>
                                        <a class="dropdown-item" href="/form05/noapprove2/{{$union ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                               
                            
                            </td>
                            @elseif($union ->petition->name == 'สวท.06')
                            <td><a href="/form06/{{$union ->id}}">{{$union ->Header}}</a></td>
                           
                            
                            <td>{{$union->approve->name}} </td>
                            <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                            <td>
                            
                            <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item"  href="/form06update2/{{$union ->id}}" >อนุมัติคำร้อง</a>
                                        <a class="dropdown-item" href="/form06/noapprove2/{{$union ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                               
                            
                            </td>
                            @elseif($union ->petition->name == 'สวท.07')
                            <td><a href="/form07/{{$union ->id}}">{{$union ->Header}}</a></td>
                           
                            
                            <td>{{$union->approve->name}} </td>
                            <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                            <td>
                            
                            <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item"  href="/form07update2/{{$union ->id}}" >อนุมัติคำร้อง</a>
                                        <a class="dropdown-item" href="/form07/noapprove2/{{$union ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                               
                            
                            </td>
                            @elseif($union ->petition->name == 'สวท.08')
                            <td><a href="/form08/{{$union ->id}}">{{$union ->Header}}</a></td>
                           
                            
                            <td>{{$union->approve->name}} </td>
                            <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                            <td>
                            
                            <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item"  href="/index08approve2/{{$union ->id}}" >อนุมัติคำร้อง</a>
                                        <a class="dropdown-item" href="/form08/noapprove2/{{$union ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                               
                            
                            </td>

                            @endif
                        </tr>
                        @endforeach

                        </tbody>
                        </table>
                        {{$unions->links()}}
    @endif
                        <h2>ผลการอนุมัติคำร้อง</h2>
                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">คำร้อง</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เรื่อง</th>
                            <th scope="col">ผู้ยื่นคำร้อง</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($unionsapprove as $approve)
                        
                        <tr>
                        <td>{{$approve->petition->name}}</td>
                        <td>{{$approve ->Date}}</td>
                        @if($approve ->petition->name == 'สวท.01')
                            <td><a href="/form01/{{$approve ->id}}">{{$approve ->Header}}</a></td>
                            <td>{{$approve ->studentcsv->Titlename}} {{$approve ->studentcsv->Fname}} {{$approve ->studentcsv->Lname}}</td>
                        @elseif($approve ->petition->name == 'สวท.05')
                            <td><a href="/form05/{{$approve ->id}}">{{$approve ->Header}}</a></td>
                            <td>{{$approve ->studentcsv->Titlename}} {{$approve ->studentcsv->Fname}} {{$approve ->studentcsv->Lname}}</td>
                        @elseif($approve ->petition->name == 'สวท.06')
                            <td><a href="/form06/{{$approve ->id}}">{{$approve ->Header}}</a></td>
                            <td>{{$approve ->studentcsv->Titlename}} {{$approve ->studentcsv->Fname}} {{$approve ->studentcsv->Lname}}</td>
                        @elseif($approve ->petition->name == 'สวท.07')
                            <td><a href="/form07/{{$approve ->id}}">{{$approve ->Header}}</a></td>
                            <td>{{$approve ->studentcsv->Titlename}} {{$approve ->studentcsv->Fname}} {{$approve ->studentcsv->Lname}}</td>
                        @elseif($approve ->petition->name == 'สวท.08')
                            <td><a href="/form08/{{$approve ->id}}">{{$approve ->Header}}</a></td>
                            <td>{{$approve ->studentcsv->Titlename}} {{$approve ->studentcsv->Fname}} {{$approve ->studentcsv->Lname}}</td>
                        @endif
                        </tr>
                        @endforeach
                        </tbody>
                        
                    
                        </table>
                        {{$unionsapprove->links()}}
        </div>
    </form>
   
</div>

@endsection