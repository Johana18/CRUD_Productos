<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="catalogo_almacen";
	$campos="*";
	$sWhere=" catalogo_almacen.nombre_almacen LIKE '%".$query."%'";
	$sWhere.=" order by catalogo_almacen.nombre_almacen";
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Nombre Almacen</th>
						<th class='text-right'>localizacion </th>
						<th class='text-center'>responsable</th>
						<th class='text-right'>tipo</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_almacen=$row['id_almacen'];
							$nombre_almacen=$row['nombre_almacen'];
							$localizacion=$row['localizacion'];
							$responsable=$row['responsable'];
							$tipo=$row['tipo'];				
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $nombre_almacen;?></td>
							<td class='text-right'><?php echo $localizacion;?></td>
							<td class='text-center'><?php echo $responsable;?></td>
							<td class='text-right' ><?php echo $tipo;?></td>
							<td>
								<a href="#"  data-target="#editAlmacenModal" class="edit_id_almacen" data-toggle="modal" data-nombre_almacen='<?php echo $nombre_almacen;?>' data-localizacion="<?php echo $localizacion;?>" data-responsable="<?php echo $responsable;?>" data-tipo="<?php echo $tipo;?>" data-id_almacen="<?php echo $id_almacen; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteAlmacenModal" class="delete" data-toggle="modal" data-id_almacen="<?php echo $id_almacen;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          
		  
