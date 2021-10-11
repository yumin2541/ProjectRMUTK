@extends('layouts.admin')
@section('body')



<div class="table-responsive">
    <h2>ประวัติการขอคำร้อง </h2>
    @if($unions2->count() < 1 )
    <br /><br />
                        <div class="alert alert-danger">
                        <p>ไม่มีคำร้องที่รออนุมัติ </p>
                        </div>
    
    @else                  
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">ตารางการขอคำร้อง</label>
            
                <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">คำร้อง</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เรื่อง</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($unions2 as $union2)
          
                            <tr>
                                <td>{{$union2->petition->name}}</td>
                                <td>{{$union2 ->Date}}</td>
                                @if($union2 ->petition->name == 'สวท.08')
                                <td><a href="/form08/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form08/delete/{{$union2 ->id}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                @if($union2->approve_id  > '4' And $union2->approve_id  < '8')
                                    <a href="/form08/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.07')
                                <td><a href="/form07/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form07/delete/{{$union2 ->id}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                @if($union2->approve_id  > '4' And $union2->approve_id  < '8')
                                    <a href="/form07/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.06')
                                <td><a href="/form06/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form06/delete/{{$union2 ->id}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                @if($union2->approve_id  > '4' And $union2->approve_id  < '8')
                                    <a href="/form06/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.05')
                                <td><a href="/form05/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form05/delete/{{$union2 ->id}}" data-name= ""  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                @if($union2->approve_id  > '4' And $union2->approve_id  < '8')
                                    <a href="/form05/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.04')
                                <td><a href="/form04/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form04/delete/{{$union2 ->id}}" data-name= "{{$union2 ->Case_radio}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                    @if($union2->approve_id  == '10')
                                    <a href="/form04/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.03')
                                <td><a href="/form03/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form03/delete/{{$union2 ->id}}" data-name= "{{$union2 ->Case_radio}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                    @if($union2->approve_id  == '10')
                                    <a href="/form03/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.02')
                                <td><a href="/form02/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form02/delete/{{$union2 ->id}}" data-name= "{{$union2 ->Case_radio}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                    @if($union2->approve_id  == '10')
                                    <a href="/form02/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                </td>
                                @elseif($union2 ->petition->name == 'สวท.01')
                                <td><a href="/form01/{{$union2 ->id}}">{{$union2 ->Case_radio}}</a></td>
                                <td>{{$union2->approve->name}}</td>
                                <td><a href="/form01/delete/{{$union2 ->id}}" data-name= "{{$union2 ->Case_radio}}"  
                                class="btn btn-danger deleteform">ยกเลิกคำร้อง
                                @if($union2->approve_id  > '4' And $union2->approve_id  < '8')
                                    <a href="/form01/edit/{{$union2 ->id}}"   
                                    class="btn btn-warning">แก้ไขคำร้อง
                                    
                                    @endif
                                    </td>
                                @endif
                                
                               
                                
                            </tr>
                            @endforeach
                            
                        </tbody>  
               

                        </table>
                        {{$unions2->links()}} 
                        @endif
                      

                        @if($unions->count() < 1 )
                        <br /><br />
                                            <div class="alert alert-danger">
                                            <p>ไม่มีคำร้องที่ผ่านการอนุมัติ </p>
                                            </div>
                        
                        @else   
                        <h2>คำร้องที่ผ่านการอนุมัติ</h2> 
                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                        
                            <th scope="col">คำร้อง</th>
                            <th scope="col">วันที่</th>
                            <th scope="col">เรื่อง</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                    
                      
                            @foreach($unions as $union)
                        
                            <tr>
                                
                                <td>{{$union ->petition->name}}</td>
                                <td>{{$union ->Date}}</td>
                                @if($union ->petition->name == 'สวท.08')
                                <td><a href="/form08/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf8/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.07')
                                <td><a href="/form07/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf7/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.06')
                                <td><a href="/form06/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf6/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.05')
                                <td><a href="/form05/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf5/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.04')
                                <td><a href="/form04/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf4/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.03')
                                <td><a href="/form03/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf3/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.02')
                                <td><a href="/form02/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf2/{{$union ->id}}">PDF</a></td>
                                @elseif($union ->petition->name == 'สวท.01')
                                <td><a href="/form01/{{$union ->id}}">{{$union ->Case_radio}}</a></td>
                                <td>{{$union->approve->name}}</td>
                                <td><a href="/downloadpdf/{{$union ->id}}">PDF</a></td>
                                @endif
                                
                                
                            </tr>
                            @endforeach
                        </tbody> 
                        </table>
                        {{$unions->links()}}
                        @endif
                        
    </form>
    

    
</div>



@endsection