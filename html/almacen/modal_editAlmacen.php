<div id="editAlmacenModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_almacen" id="edit_almacen">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Almacen</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre Almacen</label>
							<input type="text" name="edit_nombre_almacen"  id="edit_nombre_almacen" class="form-control" required>
							<input type="hidden" name="edit_id_almacen" id="edit_id_almacen" >
						</div>
						<div class="form-group">
							<label>Localización</label>
							<input type="text" name="edit_localizacion" id="edit_localizacion" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Responsable</label>
							<input type="text" name="edit_responsable" id="edit_responsable" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tipo</label>
							<select id="edit_tipo" name="edit_tipo">
   							 	<option value="Fisico">Fisico</option>
   							 	<option value="Virtual">Virtual</option>
 							</select>
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