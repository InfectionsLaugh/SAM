$(document).ready(function() {  
  $('#equipo').on('change', function() {
    var marca = $(this).find(':selected').data('marca');
    var modelo = $(this).find(':selected').data('modelo');
    var pass = $(this).find(':selected').data('pass');
    var ip = $(this).find(':selected').data('ip');

    console.log(marca, modelo, pass, ip);

    $('#dirIp').val(ip);
    if(pass == '')
      $('#password').val('N/A');
    else
      $('#password').val(pass);
    $('#marca').val(marca);
  });

  $('#enviar').click(function() {
    // $.ajaxSetup({
    //   headers: {
    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),      }
    // });

    // $.ajax({
    //   type : 'POST',
    //   dataType : "JSON",
    //   data : {
    //     'nombre' : $('#nombreProf').val(),
    //     'ubicacion' : $('#ubicacionProf').val(),
    //     'extension' : $('#extension').val(),
    //     'correo' : $('#correo').val(),
    //     'equipo' : $('#equipo').val(),
    //     'dirIp' : $('#dirIp').val(),
    //     'password' : $('#password').val(),
    //     'marca' : $('#marca').val(),
    //     'modelo' : $('#modelo').val(),
    //     'fecha_cita' : $('#fechaSolicitud').val(),
    //     'descProblema' : $('#descProblema').val()
    //   },
    //   url : '/inicio/solicitud',
    //   success : function(msg) {
    //     toastr["success"]("Su solicitud se ha recibido. Pronto recibirá confirmación.");
    //   },
    //   error : function(err) {
    //     toastr["error"]("Ha ocurrido un error procesando su solicitud. Inténtelo de nuevo más tarde.");
    //   }
    // });
  });
});