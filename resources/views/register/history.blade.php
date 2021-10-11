@extends('layouts.admin')
@section('body')
<div class="table-responsive">
    <h2>กำลังรออนุมัติคำร้อง</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ตารางการขอคำร้อง</label>
            
           
    @if($datas->count() < 1 And $datas03->count() < 1 And $datas04->count() < 1)
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
                            <th scope="col">การอนุมัติคำร้อง</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                        
                        @foreach($unions2 as $union2)
                        
                            <tr>
                            
                                
                                <td>{{$union2->petition->name}}</td> 
                                <td>{{$union2 ->Date}}</td>
                                @if($union2 ->petition->name == 'สวท.02')
                                <td><a href="/form02/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                               
                                
                                <td>{{$union2->approve->name}} </td>
                                <td>{{$union2 ->studentcsv->Titlename}} {{$union2 ->studentcsv->Fname}} {{$union2 ->studentcsv->Lname}}</td>
                                <td>
                                
                                   
                                <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item"  href="/indexapprove4/{{$union2 ->id}}" >อนุมัติคำร้อง</a>
                                        <a class="dropdown-item" href="/form02/noapprove4/{{$union2 ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                                   
                                
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.03')
                                <td><a href="/form03/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                               
                                
                                <td>{{$union2->approve->name}} </td>
                                <td>{{$union2 ->studentcsv->Titlename}} {{$union2 ->studentcsv->Fname}} {{$union2 ->studentcsv->Lname}}</td>
                                <td>
                                
                                <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                        <a class="dropdown-item"  href="/index03approve4/{{$union2 ->id}}" >อนุมัติคำร้อง</a>
                                        <a class="dropdown-item" href="/form03/noapprove4/{{$union2 ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                             
                                   
                                
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.04')
                                <td><a href="/form04/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                               
                                
                                <td>{{$union2->approve->name}} </td>
                                <td>{{$union2 ->studentcsv->Titlename}} {{$union2 ->studentcsv->Fname}} {{$union2 ->studentcsv->Lname}}</td>
                                <td>
                                
                                <div class="dropdown show">
                                    <button class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       ----โปรดเลือก----
                                    </button>
                                    <div class="dropdown-menu dropdown">
                                    @if($union2 ->Case_radio == 'ทำบัตรนักศึกษาใหม่')
                                         <a class="dropdown-item" href="/index044approve4/{{$union2 ->id}}">อนุมัติคำร้อง</a>
                                    @elseif($union2 ->Case_radio == 'เปลี่ยนชื่อ-สกุล')
                                        <a class="dropdown-item" href="/form04update4/{{$union2 ->id}}">อนุมัติคำร้อง</a>
                                    @elseif($union2 ->Case_radio == 'ทำบัตรนักศึกษาใหม่,เปลี่ยนชื่อ-สกุล')
                                        <a class="dropdown-item" href="/index044approve4/{{$union2 ->id}}">อนุมัติคำร้อง</a>
                                    @endif
                                        <a class="dropdown-item" href="/form04/noapprove4/{{$union2 ->id}}">ไม่อนุมัติคำร้อง</a>  
                                    </div>
                             
                                   
                                
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                        
                    

    @endif
                        </table>
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
                    
                      
                            @foreach($unions as $union)
                        
                            <tr>
                                
                                <td>{{$union ->petition->name}}</td>
                                <td>{{$union ->Date}}</td>
                                @if($union ->petition->name == 'สวท.04')
                                <td><a href="/form04/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                                @elseif($union ->petition->name == 'สวท.03')
                                <td><a href="/form03/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                                @elseif($union ->petition->name == 'สวท.02')
                                <td><a href="/form02/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union ->studentcsv->Titlename}} {{$union ->studentcsv->Fname}} {{$union ->studentcsv->Lname}}</td>
                                @endif
                                
                                
                            </tr>
                            @endforeach
                        </tbody> 
                    
                        </table>
                        
        </div>
    </form>
</div>

@endsection