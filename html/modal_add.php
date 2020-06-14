<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Sku</label>
							<input type="text" name="sku"  id="sku" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" name="descripcion" id="descripcion" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Marca</label>
							<input type="text" name="marca" id="marca" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Color</label>
							<input type="texto" name="color" id="color" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio</label>
							<input type="text" name="precio" id="precio" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>