<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} else if (!empty($_POST['delete_id'])){
	require_once("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $id_almacen=intval($_POST['delete_id']);
	

	// DELETE FROM  database
    $sql = "DELETE FROM  catalogo_almacen WHERE id_almacen='$id_almacen'";
    $query = mysqli_query($con,$sql);
    // if almacen has been added successfully
    if ($query) {
        $messages[] = "El registro ha sido eliminado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la eliminación falló. Por favor, regrese y vuelva a intentarlo.";
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