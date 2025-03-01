<?php
	if (empty($_POST['edit_nombre_almacen'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_nombre_almacen'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $nombre_almacen = mysqli_real_escape_string($con,(strip_tags($_POST["edit_nombre_almacen"],ENT_QUOTES)));
	$localizacion = mysqli_real_escape_string($con,(strip_tags($_POST["edit_localizacion"],ENT_QUOTES)));
	$responsable = mysqli_real_escape_string($con,(strip_tags($_POST["edit_responsable"],ENT_QUOTES)));
	$tipo = mysqli_real_escape_string($con,(strip_tags($_POST["edit_tipo"],ENT_QUOTES)));

	
	$id_almacen=intval($_POST['edit_id_almacen']);
	// UPDATE data into database
	$query = mysqli_query($con,"UPDATE catalogo_almacen SET nombre_almacen='".$nombre_almacen."', localizacion='".$localizacion."', responsable='".$responsable."', tipo='".$tipo."' WHERE id_almacen='".$id_almacen."' ");
    // if almacen has been added successfully
    if ($query) {
        $messages[] = "El registro ha sido actualizado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la actualización falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			