//Almacen
$(function() {
    load(1);
});
function load(page){
    var query=$("#q").val();
    var per_page=10;
    var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'ajax/listar_almacen.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#loader").html("Cargando...");
      },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
}
$('#editAlmacenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var nombre_almacen = button.data('nombre_almacen') 
  $('#edit_nombre_almacen').val(nombre_almacen)
  var localizacion = button.data('localizacion') 
  $('#edit_localizacion').val(localizacion)
  var responsable = button.data('responsable') 
  $('#edit_responsable').val(responsable)
  var tipo = button.data('tipo') 
  $('#edit_tipo').val(tipo)
  var id_almacen = button.data('id_almacen') 
  $('#edit_id_almacen').val(id_almacen)
})

$('#deleteAlmacenModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id_almacen = button.data('id_almacen') 
  $('#delete_id').val(id_almacen)
})


$( "#edit_almacen" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/editar_almacen.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#editAlmacenModal').modal('hide');
          }
    });
  event.preventDefault();
});


$( "#add_almacen" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/guardar_almacen.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#addAlmacenModal').modal('hide');
          }
    });
  event.preventDefault();
});

$( "#delete_almacen" ).submit(function( event ) {
  var parametros = $(this).serialize();
    $.ajax({
            type: "POST",
            url: "ajax/eliminar_almacen.php",
            data: parametros,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
            $("#resultados").html(datos);
            load(1);
            $('#deleteAlmacenModal').modal('hide');
          }
    });
  event.preventDefault();
});