<?php include_once('partials/header.php'); ?>
	<div class="row">
		<div class="container">
			<div class="card border-primary mb-3 mt-3">
				<div class="card-header"><strong>Product Inventory</strong></div>
				<div class="card-body">
					<?php if ($this->session->flashdata('msg')): ?>
						<div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong><?php echo $this->session->flashdata('msg'); ?></strong> 
						</div>
					<?php endif ?>
					<div class="row">					
						<div class="col-md-8">
						<h5>Product List</h5>
							<table class="table table-hover table-striped">
								<thead class="text-center">
									<tr>
									<th scope="col">ID</th>
									<th scope="col">Name</th>
									<th scope="col">Description</th>
									<th scope="col">Price</th>
									<th scope="col">Stock</th>
									<th scope="col" colspan=2>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($products) <= 0): ?>
										<tr class="text-center">
											<td colspan=7>
												<h4>No records to show</h4>
											</td>
										</tr>
									<?php endif ?>
									
									
									<?php foreach ($products as $product): ?>
										<tr class="text-center">
											<td scope="row"><?= $product->id ?></th>
											<td><?= $product->name ?></td>
											<td><?= character_limiter($product->description, 15) ?></td>
											<td><?= $product->price ?></td>
											<td><?= $product->stock ?></td>
											<td>
												<a href="javascript:void(0);" class="edit-product-modal"
												data-id="<?= $product->id ?>"
												data-name="<?= $product->name ?>"
												data-description="<?= $product->description ?>"
												data-price="<?= $product->price ?>"
												data-stock="<?= $product->stock ?>">
												<span class="badge badge-warning">Edit</span>
												</a>
											</td>
											<td>
											<a href="inventory/delete/<?= $product->id ?>" onclick="return confirm('Are you sure you want to delete <?= $product->name ?>?')">
												<span class="badge badge-danger">Delete</span>
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table> 
						</div>

						<div class="col-md-4">
							<div class="card border-success mb-3">
								<div class="card-body">
									<?php echo form_open('inventory/save'); ?>
										<fieldset>
											<legend>Add Product</legend>
											<div class="form-group">
												<label for="name">Name</label>
												<?php echo form_input(['type' => 'text', 'name' => 'name', 'value' => set_value('name'), 'class' => !empty(form_error('name')) ? 'form-control is-invalid' :  'form-control' ]); ?>
												<?php echo form_error('name', '<div class="invalid-feedback" style="display:block">', '</div>') ?>
											</div>

											<div class="form-group">
												<label for="description">Description</label>
												<?php echo form_textarea(['name' => 'description', 'value' => set_value('description'), 'class' => 'form-control', 'rows' => 3]); ?>
												
											</div>

											<div class="form-group">
												<label for="price">Price</label>
												<?php echo form_input(['name' => 'price', 'value' => set_value('price'), 'class' => !empty(form_error('price')) ? 'form-control is-invalid' :  'form-control']); ?>
												<?php echo form_error('price', '<div class="invalid-feedback" style="display:block">', '</div>') ?>
											</div>

											<div class="form-group">
												<label for="stock">Stock</label>
												<?php echo form_input(['name' => 'stock', 'value' => set_value('stock'), 'class' => !empty(form_error('stock')) ? 'form-control is-invalid' :  'form-control']); ?>
												<?php echo form_error('stock', '<div class="invalid-feedback" style="display:block">', '</div>') ?>
											</div>

											<button type="submit" class="btn btn-primary">Submit</button>
										</fieldset>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php include('edit_modal.php') ?>
			
		</div>
	</div>


<script>


</script>

<?php include_once('partials/footer.php'); ?>
