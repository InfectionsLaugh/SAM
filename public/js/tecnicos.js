$(document).ready(function () {
  $('#maestro_id').on('change', function() {
    var num = $(this).find(':selected').data('num');
    var email = $(this).find(':selected').data('email');

    $('#numEmpleado').val(num);
    $('#email').val(email);

    $('.datos-profe').addClass('active');
  });

  $(document).on('click','.mes', function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type : 'POST',
      data : {
        'mes' : $(this).attr('id'),
        'anio' : $(this).data('year')
      },
      url : '/sam-admin/lista_docs',
      success : function(msg) {
        $('#lista_docs').html(msg);
      }, error : function(msg) {
        toastr["error"]('Ha ocurrido un error mostrando las solicitudes.');
      }
    });
  });

  $('.anio').click(function() {
    var anio = $(this).attr('id');
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type : 'POST',
      data : {
        'anio' : anio
      },
      url : '/sam-admin/get_docs/'+anio,
      success : function(msg) {
        $('#docs').addClass('animar');
        $('#docs').html(msg);
      }, error : function(msg) {
        toastr['error']('Ha ocurrido un error mostrando los mantenimientos.');
      }
    });
  });

  $('.updt-sol').click(function(e) {
    e.preventDefault();

    var man_id = $(this).data('id');
    var tec_id = $('#tecnico_id_'+man_id).val();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept' : 'application/json'
      }
    });

    $.ajax({
      type : "POST",
      dataType : "JSON",
      data : {
        'id' : man_id,
        'tecnico_id' : tec_id,
        '_method' : 'PATCH'
      },
      url : '/sam-admin/update_sol/'+man_id,
      success : function(msg) {
        toastr["success"]("Se ha asignado al técnico con éxito");
      }, error : function(msg) {
        toastr["error"]('Ha ocurrido un error asignando al técnico');
      }
    });
  });

  $('#exito').on("click", function(e) {
    e.preventDefault();
    var nombre = $('#nombre').val();
    var ap_pat = $('#ap_pat').val();
    var ap_mat = $('#ap_mat').val();
    var matricula = $('#matricula').val();
    var email = $('#email').val();
    var tipo_usuario = $('#tipo_usuario').val();
    var num_huella = $('#num_huella').val();
    var hrs_lunes = $('#hrs_lunes').val() + ' - ' + $('#hrs_lunes_fin').val();
    var hrs_martes = $('#hrs_martes').val() + ' - ' + $('#hrs_martes_fin').val();
    var hrs_miercoles = $('#hrs_miercoles').val() + ' - ' + $('#hrs_miercoles_fin').val();
    var hrs_jueves = $('#hrs_jueves').val() + ' - ' + $('#hrs_jueves_fin').val();
    var hrs_viernes = $('#hrs_viernes').val() + ' - ' + $('#hrs_viernes_fin').val();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: "/sam-admin/registra_tecnico",
      data: {
        nombre : nombre,
        ap_pat : ap_pat,
        ap_mat : ap_mat,
        matricula : matricula,
        telefono : $('#telefono').val(),
        email : email,
        tipo_usuario : tipo_usuario,
        num_huella : num_huella,
        hrs_lunes : hrs_lunes,
        hrs_martes : hrs_martes,
        hrs_miercoles : hrs_miercoles,
        hrs_jueves : hrs_jueves,
        hrs_viernes : hrs_viernes
      },
      success : function(e) {
        toastr["success"]("Se ha registrado al técnico con éxito");
      },
      error : function(err) {
        for(var k in err.responseJSON.errors) {
          toastr["error"](err.responseJSON.errors[k][0]);
        }
      }
    });
  });

  $(document).on("click", '.horario', function(e) {
    e.preventDefault();
    var id = $(this).attr('id');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type : 'POST',
      dataType : 'JSON',
      data : {
        id : id
      },
      url : '/sam-admin/horario/'+id,
      success : function(msg) {
        $('.modal-title').html('Horario de ' + msg.name);
        $('.modal-body').html(msg.view);
      }, error : function(msg) {
        console.log(msg);
      }
    });
  });

  $(document).on('click', '.del_tec', function() {
    var id = $(this).attr('data-id');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type : "POST",
      dataType : "JSON",
      data : {
        id : id,
        _method : 'PATCH'
      },
      url : '/sam-admin/tecnicos/'+id,
      success : function(msg) {
        toastr["success"]("Se ha borrado con éxito");
        console.log(msg);
        $('#tabla').html(msg.msg);
      }, error : function(msg) {
        toastr["error"]("Ha ocurrido un error borrando");
      }
    });
  });

  $('#registraEquipo').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type : "POST",
      dataType : 'JSON',
      data : {
        maestro_id : $('#maestro_id').val(),
        serie : $('#serie').val(),
        num_control : $('#numero_control').val(),
        descripcion : $('#descripcion').val(),
        marca : $('#marca').val(),
        modelo : $('#modelo').val(),
        dir_ip : $('#dir_ip').val(),
        observaciones : $('#observaciones').val()
      },
      url : '/sam-admin/registra_equipo',
      success : function(msg) {
        toastr['success']('Se ha registrado el equipo con éxito.');
      }, error : function(msg) {
        for(var k in msg.responseJSON.errors) {
          console.log(k, msg.responseJSON.errors[k][0]);
          toastr['error'](msg.responseJSON.errors[k][0]);
        }
      }
    })
  });
});
