<?php
	if (empty($_POST['nombre_almacen'])){
		$errors[] = "Ingresa el ID del producto.";
	} elseif (!empty($_POST['nombre_almacen'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $nombre_almacen = mysqli_real_escape_string($con,(strip_tags($_POST["nombre_almacen"],ENT_QUOTES)));
    $localizacion = mysqli_real_escape_string($con,(strip_tags($_POST["localizacion"],ENT_QUOTES)));
	$responsable = mysqli_real_escape_string($con,(strip_tags($_POST["responsable"],ENT_QUOTES)));
	$tipo = mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));

	// REGISTER data into database
    $sql = "INSERT INTO catalogo_almacen (id_almacen, nombre_almacen, localizacion, responsable, tipo) VALUES (NULL,'$nombre_almacen','$localizacion','$responsable','$tipo')";
    $query = mysqli_query($con,$sql );
    // if product has been added successfully
    if ($query) {
        $messages[] = "El registro ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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