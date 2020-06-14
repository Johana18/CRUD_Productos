<div id="addAlmacenModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="add_almacen" id="add_almacen">
				<div class="modal-header">						
					<h4 class="modal-title">Agregar Almacen</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nombre Almacen</label>
						<input type="text" name="nombre_almacen"  id="nombre_almacen" class="form-control" required>
						
					</div>
					<div class="form-group">
						<label>Localización</label>
							<input type="text" name="localizacion" id="localizacion" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Responsable</label>
							<input type="text" name="responsable" id="responsable" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tipo</label>
						<select id="tipo" name="tipo">
   							 <option value="fisico">Fisico</option>
   							 <option value="virtual">Virtual</option>
 						 </select>
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