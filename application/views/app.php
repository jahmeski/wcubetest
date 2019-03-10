<?php include_once('partials/header.php'); ?>
	<div class="row">
		<div class="container mt-5">
			<div class="jumbotron">
				<h1 class="display-2 text-center">Greetings!</h1>
				<p class="lead text-center">This is a sample program that features a Inventory sytem wit CRUD functionalities and a Simple Shopping Cart section</p>
				<hr class="my-4">
				<h5 class="display-4 text-center">Let's get Started!</h5>
				
				<div class="row">
				<p class="lead col-md-6">
					<?php echo anchor('inventory', 'Inventory System', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
				</p>
				<p class="lead col-md-6">
				<?php echo anchor('shop', 'Shopping Cart', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
				</p>
				</div>
			</div>
		</div>
	</div>
<?php include_once('partials/header.php'); ?>
