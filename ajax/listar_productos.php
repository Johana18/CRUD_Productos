<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="catalogo_producto";
	$campos="*";
	$sWhere=" catalogo_producto.sku LIKE '%".$query."%'";
	$sWhere.=" order by catalogo_producto.sku";
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
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
						<th class='text-center'>Sku</th>
						<th>Descripcion </th>
						<th>Marca </th>
						<th class='text-center'>Color</th>
						<th class='text-right'>Precio</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_producto=$row['id_producto'];
							$sku=$row['sku'];
							$descripcion=$row['descripcion'];
							$marca=$row['marca'];
							$color=$row['color'];
							$precio=$row['precio'];						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $sku;?></td>
							<td ><?php echo $descripcion;?></td>
							<td ><?php echo $marca;?></td>
							<td class='text-center' ><?php echo $color;?></td>
							<td class='text-right'><?php echo number_format($precio,2);?></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit_id" data-toggle="modal" data-sku='<?php echo $sku;?>' data-descripcion="<?php echo $descripcion;?>" data-marca="<?php echo $marca;?>" data-color="<?php echo $color;?>" data-precio="<?php echo $precio;?>" data-id_producto="<?php echo $id_producto; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id_producto="<?php echo $id_producto;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
		  
