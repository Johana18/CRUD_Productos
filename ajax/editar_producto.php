<?php
	if (empty($_POST['edit_sku'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_sku'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $sku = mysqli_real_escape_string($con,(strip_tags($_POST["edit_sku"],ENT_QUOTES)));
	$descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["edit_descripcion"],ENT_QUOTES)));
	$marca = mysqli_real_escape_string($con,(strip_tags($_POST["edit_marca"],ENT_QUOTES)));
	$color = mysqli_real_escape_string($con,(strip_tags($_POST["edit_color"],ENT_QUOTES)));
	$precio = floatval($_POST["edit_precio"]);
	
	$id_producto=intval($_POST['edit_id_producto']);
	// UPDATE data into database
	$query = mysqli_query($con,"UPDATE catalogo_producto SET sku='".$sku."', descripcion='".$descripcion."', marca='".$marca."', color='".$color."',  precio='".$precio."' WHERE id_producto='".$id_producto."' ");
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido actualizado con éxito.";
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