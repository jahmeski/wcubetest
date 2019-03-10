<div class="modal" id="edit-modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="modal-title">Edit Product</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body" id="modal-body">
			<?php echo form_open('inventory/update'); ?>
			<?php echo form_input(['type' => 'hidden', 'name' => 'id', 'value' => set_value('id'), 'id' => 'id' ]); ?>
				<fieldset>
					<div class="form-group">
						<label for="name">Name</label>
						<?php echo form_input(['type' => 'text', 'name' => 'name', 'value' => set_value('name'), 'class' => !empty(form_error('name')) ? 'form-control is-invalid' :  'form-control', 'id' => 'name' ]); ?>
						<?php echo form_error('name', '<div class="invalid-feedback" style="display:block">', '</div>') ?>
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<?php echo form_textarea(['name' => 'description', 'value' => set_value('description'), 'class' => 'form-control', 'rows' => 2, 'id' => 'description' ]); ?>
						
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						<?php echo form_input(['name' => 'price', 'value' => set_value('price'), 'class' => !empty(form_error('price')) ? 'form-control is-invalid' :  'form-control', 'id' => 'price' ]); ?>
						<?php echo form_error('price', '<div class="invalid-feedback" style="display:block">', '</div>') ?>
					</div>

					<div class="form-group">
						<label for="stock">Stock</label>
						<?php echo form_input(['name' => 'stock', 'value' => set_value('stock'), 'class' => !empty(form_error('stock')) ? 'form-control is-invalid' :  'form-control', 'id' => 'stock' ]); ?>
						<?php echo form_error('stock', '<div class="invalid-feedback" style="display:block">', '</div>') ?>
					</div>
				</fieldset>
			<?php echo form_close(); ?>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-update">Update</button>
			<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
