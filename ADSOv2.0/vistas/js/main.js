// Ejemplo de JavaScript inicial para deshabilitar el envío de formularios si hay campos no válidos
$(function () {
    
    var tabla = null;
    listarUsuarios();
    'use strict'
  
    // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
    var forms = document.querySelectorAll('#formRegistroUsuario')
  
    // Bucle sobre ellos y evitar el envío
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            form.classList.add('was-validated')

          } else {
            
            event.preventDefault()

            var nombre = $('#txt_nombre').val();
            var apellido = $('#txt_apellido').val();
            var direccion = $('#txt_direccion').val();
            var documento = $('#txt_documento').val();
            var email = $('#txt_email').val();
            var telefono = $('#txt_telefono').val();
            var sexo = $('#txt_sexo').val();

            var objData = new FormData();
            objData.append("regNombre", nombre);
            objData.append("regApellido", apellido);
            objData.append("regDireccion", direccion);
            objData.append("regDocumento", documento);
            objData.append("regEmail", email);
            objData.append("regTelefono", telefono);
            objData.append("regSexo", sexo);

            fetch('control/usuarioControl.php', {
              method: 'POST',
              body: objData
            }).then(response => response.json()).catch(error => {
              console.log(error);
            }).then(response => {
              Swal.fire({
                title: response["mensaje"],
                confirmButtonText: 'ok'
              });
              alert(response);
              $("#ventanaIngresarUsuarios").modal('toggle');
              $("#txt_nombre"),val('');
              $("#txt_apellido"),val('');
              $("#txt_direccion"),val('');
              $("txt_documento"),val('');
              $("txt_email"),val('');
              $("txt_telefono"),val('');
              $("txt_sexo"),val('');
              listarUsuarios();
            });

          }
  
        }, false)
      })

      function listarUsuarios() {
        var objData = new FormData();
        objData.append("listarUsuarios","ok");

        fetch('control/usuarioControl.php', {
          method: 'POST',
          body: objData,
        }).then(response => response.json()).catch(error => {
          console.log(error);
        }).then(response => {
          cargarDatos(response); 
        });

      }

      function cargarDatos(response) {
        console.log(response);
        var dataSet = [];//crear donde se van a guardar los datos que vienen de la base de datos
        
        response.forEach(listarDatos);//recorrer los datos dentro del dataSet

        function listarDatos(item, index) {
          var objBotones = '<div class="btn-group">';//insertar los botones de las acciones
          objBotones += '<button id="btnEditar" type="button" class="btn btn-warning" usuario="'+item.idusuario+'" nombre="' + item.nombre + '" apellido="' + item.apellido + '" direccion="' + item.direccion + '" documento="' + item.documento + '" email="' + item.email + '" telefono="' + item.telefono + '" sexo="' + item.sexo + '" data-bs-toggle="modal" data-bs-target="#ventanaEditarUsuarios">Editar</button>';
          objBotones += '<button id="btnEliminar" type="button" class="btn btn-danger" usuario="'+item.idusuario+'">Eliminar</button>';
          objBotones += '</div>';

          dataSet.push([item.nombre,item.apellido,item.direccion,item.documento,item.email,item.telefono,item.sexo,objBotones]);//permite agregar los elementos ya sea de acuerdo a sus pocisiones (0,1,2...) como a lo reglamentado en la tabla (nombre, apellido....)
          
        }

        if (tabla != null) {
          $('#tablaUsuarios').dataTable().fnDestroy();
        }

        tabla = $('#tablaUsuarios').DataTable({
          data: dataSet
        });
      }

      $('#tablaUsuarios').on("click", "#btnEditar", function(){

        var nombre = $(this).attr('nombre');
        var apellido = $(this).attr('apellido');
        var direccion = $(this).attr('direccion');
        var documento = $(this).attr('documento');
        var email = $(this).attr('email');
        var telefono = $(this).attr('telefono');
        var sexo = $(this).attr('sexo');
        var idusuario = $(this).attr('usuario');
        
        $("#txt_editnombre").val(nombre);
        $("#txt_editapellido").val(apellido);
        $("#txt_editdireccion").val(direccion);
        $("#txt_editdocumento").val(documento);
        $("#txt_editemail").val(email);
        $("#txt_edittelefono").val(telefono);
        $("#txt_editsexo").val(sexo);
        $("#btnEditarRegistro").attr("usuario", idusuario);

      });

      var forms2 = document.querySelectorAll('#formEditarUsuario')

      Array.prototype.slice.call(forms2)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            form.classList.add('was-validated')

          } else {
            
            event.preventDefault()

            var nombre = $('#txt_editnombre').val();
            var apellido = $('#txt_editapellido').val();
            var direccion = $('#txt_editdireccion').val();
            var documento = $('#txt_editdocumento').val();
            var email = $('#txt_editemail').val();
            var telefono = $('#txt_edittelefono').val();
            var sexo = $('#txt_editsexo').val();
            var id = $('#btnEditarRegistro').attr("usuario");

            var objData = new FormData();
            objData.append("regEditNombre", nombre);
            objData.append("regEditApellido", apellido);
            objData.append("regEditDireccion", direccion);
            objData.append("regEditDocumento", documento);
            objData.append("regEditEmail", email);
            objData.append("regEditTelefono", telefono);
            objData.append("regEditSexo", sexo);
            objData.append("idUsuario", id);

            fetch('control/usuarioControl.php', {
              method: 'POST',
              body: objData
            }).then(response => response.json()).catch(error => {
              console.log(error);
            }).then(response => {
              Swal.fire({
                title: response["mensaje"],
                confirmButtonText: 'si'
              });
              $("#ventanaEditarUsuarios").modal('toggle');
              listarUsuarios();
            });

          }
  
        }, false)
      })

      $('#tablaUsuarios').on("click", "#btnEliminar", function(){

        var idusuario = $(this).attr('usuario');//obtenga el id y se lo dejo a esta función

        var objDelete = new FormData();
        objDelete.append("EliminarUsuarios", idusuario);

        fetch('control/usuarioControl.php', {
          method: 'POST',
          body: objDelete,
        }).then(response => response.json()).catch(error => {
          console.log(error);
        }).then(response => {
          Swal.fire({
            title: response["mensaje"],
            confirmButtonText: ':)'
          });
          listarUsuarios();
        });
      });
})


  