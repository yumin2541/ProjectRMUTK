$('.submitform').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    
    swal({
        title: 'ยืนยันที่จะอนุมัติ ?',
        icon: 'warning',
        
        buttons: ["ยกเลิก", "ใช่ ฉันต้องการอนุมัติคำร้อง!"],
        
        dangerMode:true,
        
    }).then(function(value) {
        if (value) {
            window.location.href = url;
           
            
            
        }
        
    });
});
