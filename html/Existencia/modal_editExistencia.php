<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Sku</label>
							<input type="text" name="edit_sku"  id="edit_sku" class="form-control" required>
							<input type="hidden" name="edit_id_producto" id="edit_id_producto" >
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" name="edit_descripcion" id="edit_descripcion" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Marca</label>
							<input type="text" name="edit_marca" id="edit_marca" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Color</label>
							<input type="text" name="edit_color" id="edit_color" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio</label>
							<input type="text" name="edit_precio" id="edit_precio" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>