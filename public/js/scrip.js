$(document).on('click','.tutup',function(){
    $('#cetak').attr('id','simpan')
    $('.modal').hide();
    $('.modal-body').html('');
    $('#cetak').attr('id','simpan')
})

//tambah data
 $('#tambah-data').on('click', function(e){
    e.preventDefault()
    var url = $(this).attr('href');
    $('#simpan').data('sortir','simpan')
    $('#simpan').html(`<i class="fa fa-save"></i>&nbsp;Simpan`)
    $('.modal-body').html('')
    $('.modal').show()
    $('.modal-title').html('Tambah Admin')
    $.ajax({
      url: url,
      dataType: 'html',
      method: 'get',
      success: function(data){
        $('.modal-body').html(data)
      }
    })
 });

//edit data
 $(document).on('click','#edit',function(e){
   e.preventDefault()
   var url=$(this).attr('href')
   var data=$(this).data('edit')
   $('#simpan').data('sortir','edit')
   $('#simpan').html(`<i class="fa fa-save"></i>&nbsp;Simpan Perubahan`)
   $('.modal-body').html('')
   $('.modal').show()
   if (data == 'user') {
     $('.modal-title').html('Edit Data Admin')
   }
   else{
    $('.modal-title').html('Edit Jadwal Interview')
   }
  
   $.ajax({
     url: url,
     dataType: 'html',
     method: 'get',
     success: function(data){
       $('.modal-body').html(data)
       var test = $("#tgl_interview").val()
         if (test) {
          $("#tgl_interview").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          autoclose: true,
          })
         }
     }
   })
 })

//interview
$(document).on('click','#interview',function(e){
   e.preventDefault()
   var url=$(this).attr('href')
   var id=$(this).data('id')
   $('#simpan').data('sortir','simpan')
   $('#simpan').html(`<i class="fa fa-save"></i>&nbsp;Simpan`)
   $('.modal-body').html('')
   $('.modal').show()
   $('.modal-title').html('Interview Pelamar')

   $.ajax({
     url: url,
     dataType: 'html',
     method: 'get',
     success: function(data){
       $('.modal-body').html(data)
        $("#tgl_interview").datepicker({
         dateFormat: "yy-mm-dd",
         minDate: 1,
         autoclose: true,
        })
        $('#id_lamaran').val(id)
     }
   })
 })
 //eksekusi query
 $(document).on('click','#simpan',function(){
   $('.text-danger').remove()
   $('.is-invalid').removeClass('is-invalid')
  var sortir=$(this).data('sortir');
  if (sortir == 'simpan') {
     var form = $('#form-tambah');
  } 
  else if(sortir == 'edit'){
   var form = $('#form-edit');
  }

       
    var   url = form.attr('action'),
       formdata= new FormData(form[0]);
      

       $.ajax({
         url: url,
         method: 'post',
         data: formdata,
         dataType: 'JSON',
         processData: false,
         processing: true,
         cache:false,
         contentType:false,
         beforeSend: function(){
         $('#simpan').prop('disabled',true);
         },
         success: function(data){
           Swal.fire(
             'Success!',
             'Berhasil Disimpan',
             'success'
           );
           $('#dataTable').DataTable().ajax.reload()
           $('.modal').hide();
            $('.modal-body').html('');

         },
         error: function(xhr){
         var pesan = xhr.responseJSON;
         Swal.fire({
           type: 'error',
           title: 'Gagal...',
           text: 'Terjadi Kesalahan!',
         });

         if ($.isEmptyObject(pesan)==false) {
             $.each(pesan.errors, function(key,value){
                 $('#'+ key).addClass('is-invalid').closest('.col-md-6').append(`<small class="text-danger">` + value[0] +`</small>`);
                 })
             }
         },
         complete: function(){
               $('#simpan').prop('disabled',false);
         }
       })
 })

 // hapus data
 $(document).on('submit','#form-delete',function(e){
    e.preventDefault();
    var url=$(this).attr('action');
     var   data=new FormData(this);
    Swal.fire({
     title: 'Apa anda yakin?',
     text: "Menghapus Data Ini",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Hapus'
   }).then((result) => {
     if (result.value) {
       $.ajax({
         url: url,
         method: 'POST',
         data: data,
         dataType: 'text',
         processData: false,
         cache:false,
         contentType:false,
         success: function(data){

           $('#dataTable').DataTable().ajax.reload()
           Swal.fire(
             'Deleted!',
             'Data Berhasil dihapus.',
             'success'
           )
         }

       })
      
     }
   })
 })