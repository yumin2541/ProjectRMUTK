$('.deleteform').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    var name=$(this).attr('data-name');
    
    swal({
        title: 'คุณแน่ใจไหมที่จะลบคำร้องนี้ ?',
        icon: 'warning',
        
        buttons: ["ยกเลิก", "ใช่ ฉันต้องการยกเลิกคำร้อง!"],
        dangerMode:true,
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
