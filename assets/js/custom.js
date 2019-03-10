$(".alert-dismissible").click(function (e) {
	$(this).fadeOut('slow');
});


$('body').on('click', '.edit-product-modal', function (event) {
	event.preventDefault();

	let id = $(this).data('id'),
		name = $(this).data('name'),
		description = $(this).data('description'),
		price = $(this).data('price'),
		stock = $(this).data('stock');
			
		$('#modal-body [name="id"]').val(id);
		$('#modal-body [name="name"]').val(name);
		$('#modal-body [name="description"]').val(description);
		$('#modal-body [name="stock"]').val(stock);	
		$('#modal-body [name="price"]').val(price);	

		$('#modal-body form').find('.invalid-feedback').remove();
		$('#modal-body form').find('.form-control').removeClass('is-invalid');

		$('#edit-modal').modal('show');
});


//update record to database
$('#btn-update').click(function (event) {
				event.preventDefault();

	let id = $('#id').val(),
		name = $('#name').val(),
		description = $('#description').val(),
		price = $('#price').val(),
		stock = $('#stock').val(),
		url = $('#modal-body form').attr('action');

		$('#modal-body form').find('.invalid-feedback').remove();
		$('#modal-body form').find('.form-control').removeClass('is-invalid');

	$.ajax({
		type : "POST",
		url  : url,
		dataType : "JSON",
		data : $('#modal-body form').serialize(),
		success: function(data){
			if(data == true){
				location.reload();
				$('#edit-modal').modal('hide');
			}
			else
			{
				$.each(data, function(key, value){
					if(value != '') {
						$('#modal-body form').find('#' + key).addClass('is-invalid').after('<span class="invalid-feedback" style="display:block"><strong>'+ value +'</strong></span>');
					}
				});
			}
		}
	});   
});
