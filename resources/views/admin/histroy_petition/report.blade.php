@extends('layouts.admin')
@section('body')
	
<div class="table-responsive">

    <h2>รายงานสรุปการขอคำร้องรายปี {{$years + 543}}</h2>
   
   
        
        <div class="form-group">
            <label for="name">ตารางการขอคำร้อง</label>

            </div>


            <form action="{{ route('test') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-inline" >
          
            <div class="form-group" >
                <select class="form-control" id=""name = "test" required>
                <option value="option_select"disabled selected>--เลือกปี--</option>
                    <?php
                    for ($year = 2560; $year <= 2565; $year++) {
                    $selected = (isset($getYear) && $getYear == $year) ? 'selected' : '';
                    echo "<option value= $year $selected> $year </option>";
                    }
                    ?>
                </select>
            </div>
            &emsp; &emsp;
            <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>

            </div>
            </form>

            </br>
              <!--  
            <div class="dropdown ">
            <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
            --เลือกปี--
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('report2019') }}">2019</a>
                <a class="dropdown-item" href="#">2020</a>
                <a class="dropdown-item" href="#">2021</a>
            </div>
            </div>
            -->
               
                
                <table class="table table-bordered table-striped">
                        <thead>
                        <tr align="center" class="bg-dark text-white">
                        <th scope="col">คำร้อง</th>
                            <th scope="col">ม.ค.</th>
                            <th scope="col">ก.พ.</th>
                            <th scope="col">มี.ค.</th>
                            <th scope="col">เม.ย.</th>
                            <th scope="col">พ.ค.</th>
                            <th scope="col">มิ.ย.</th>
                            <th scope="col">ก.ค.</th>
                            <th scope="col">ส.ค.</th>
                            <th scope="col">ก.ย.</th>
                            <th scope="col">ต.ค.</th>
                            <th scope="col">พ.ย.</th>
                            <th scope="col">ธ.ค.</th>
                            <th  class="table-danger text-dark"><strong>รวม</strong></th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                                <tr align="center">

                                <td><strong>สวท.01</strong></td>
                            
                                @foreach($userArrs as $userArr)
                                <td>{{$userArr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas01}}</td>
                        
                                </tr> 
                                <tr align="center">
                                <td><strong>สวท.02</strong></td>
                             
                                @foreach($p2Arrs as $p2Arr)
                                <td>{{$p2Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas02}}</td>
                                </tr> 
                                <tr align="center">
                                <td><strong>สวท.03</strong></td>
                                
                                @foreach($p3Arrs as $p3Arr)
                                <td>{{$p3Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas03}}</td>
                                </tr> 
                                <tr align="center"> 
                                <td><strong>สวท.04</strong></td>
                              
                                @foreach($p4Arrs as $p4Arr)
                                <td>{{$p4Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas04}}</td>
                                </tr>
                                <tr align="center"> 
                                <td><strong>สวท.05</strong></td>
                               
                                @foreach($p5Arrs as $p5Arr)
                                <td>{{$p5Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas05}}</td>
                                </tr> 
                                <tr align="center">
                                <td><strong>สวท.06</strong></td>
                              
                                @foreach($p6Arrs as $p6Arr)
                                <td>{{$p6Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas06}}</td>
                                </tr> 
                                <tr align="center">
                                <td><strong>สวท.07</strong></td>
                             
                                @foreach($p7Arrs as $p7Arr)
                                <td>{{$p7Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas07}}</td>
                                </tr> 

                                <tr align="center">
                                <td><strong>สวท.08</strong></td>
                             
                                @foreach($p8Arrs as $p8Arr)
                                <td>{{$p8Arr}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas08}}</td>
                                </tr> 

                                 <tr align="center">
                                <td class="table-danger text-dark" ><strong>รวม</strong></td>
                             
                                @foreach($sums as $sum)
                                <td class="table-warning">{{$sum}}</td>
                                @endforeach
                                <td class="table-warning">{{$datas01 + $datas02 + $datas03 + $datas04 + $datas05 + $datas06 + $datas07 + $datas08}}</td>
                                </tr> 
                                
                             
                                
                        </tbody>
                       
              </table>
              <h2>รวมคำร้องทั้งหมดในปีนี้ : {{$datas01 + $datas02 + $datas03 + $datas04 + $datas05 + $datas06 + $datas07 + $datas08}}</h2>
        </div>
        
    
    
</div>
<script>
$(document).ready(function(){

    
    $('#filter').click(function(){
        var filter_country = $('#filter_country').val();

        
    });

});
</script>

@endsection