<div id="editExistenciaModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_existencia" id="edit_existencia">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Existencias de Producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Existencias</label>
							<input type="text" name="edit_existencias"  id="edit_existencias" class="form-control" required>
							<input type="hidden" name="edit_id_existencias" id="edit_id_existencias" >
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