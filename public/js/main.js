// Handling update and create form
$(document).on('submit', '#updateForm, #createForm', function (e) {
	e.preventDefault();
	$('.invalid-feedback').remove();
	$('.alert-success').remove();
	$('input').removeClass('is-invalid');

	let form = $(this);
	let target = $(e.target);

	$.ajax({
		type: 'POST',
		url: 'save.php',
		data: form.serialize(),
		dataType: "json",
		complete: function(data)
		{
			if (data.responseJSON.success) {
				if (target.is('#createForm')) {
					window.location.replace('index.php');
				} else {
					$('.header').after('<div class="alert alert-success">' + 'Uppgifterna är uppdaterade' + '</div>');
				}
			} else {
				$.each(data.responseJSON.errorMessage, function (key, value) {
					$('#' + key).addClass('is-invalid');
					$('#' + key).after('<div class="invalid-feedback">' + value + '</div>');
				});
			}
		}
	})
});

// Bind click to Delete button within popup
$(document).on('click', '#confirm-delete .btn-delete', function(e) {
	var $modalDiv = $(e.delegateTarget);
	var id = $(this).data('respondantId');

	$.ajax({
		type: 'POST',
		url: 'delete.php',
		data: { id: id},
		success: function()
		{
			window.location.replace('index.php');
		}
	});
});

// Bind to modal opening to set necessary data properties to be used to make request
$(document).on('show.bs.modal', '#confirm-delete', function(e) {
  var data = $(e.relatedTarget).data();
  $('.btn-delete', this).data('respondantId', data.respondantId);
});
