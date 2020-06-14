<?php
	if (empty($_POST['sku'])){
		$errors[] = "Ingresa el sku del producto.";
	} elseif (!empty($_POST['sku'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $sku = mysqli_real_escape_string($con,(strip_tags($_POST["sku"],ENT_QUOTES)));
	$descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
	$marca = mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
	$color = mysqli_real_escape_string($con,(strip_tags($_POST["color"],ENT_QUOTES)));
	$precio = floatval($_POST["precio"]);
	
	// REGISTER data into database
    $sql = "INSERT INTO catalogo_producto(id_producto, sku, descripcion, marca, color, precio) VALUES (NULL,'$sku','$descripcion','$marca','$color','$precio')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
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