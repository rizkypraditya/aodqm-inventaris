$(function(){
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Apakah Anda Yakin?',
                  text: "Menghapus Data Ini?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#618264',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Terhapus!',
                      'File Anda Terhapus.',
                      'success'
                    )
                  }
                }) 


  });

});