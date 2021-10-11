<!-- Add Modal -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4>รายละเอียดอนุมัติ</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				
			</div>
			<div class="modal-body">
            <form action="/form01update/{{$data ->id}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
               
                <div class="col-md-8">
                    <label for="name">*เขียนรายละเอียดการอนุมัติ</label>
                    <textarea class="form-control" name="advice_teacher" rows="5" id=""></textarea>
                    
                </div>
             
               
                <div class="col-md-8">
                    <label for="name">ลงชื่อ</label>
                    <input type="text" class="form-control" name="sige_teacher" id="" value = "{{$users ->first()->Titlename}} {{$users ->first()->Fname}} {{$users ->first()->Lname}}"readonly>
                </div>
                
            
                <br />      
			</div>
			<div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">ยืนยัน</button>
			</form>
			</div>
		</div>
	</div>
</div>