$(document).ready(function() {

	var $path = '/oana/advanced/backend/web/admin/api';
	var header_note = $('.new_messages_header');

	ajaxGet($path, header_note);

	
	setInterval(function() {

		ajaxGet($path, header_note);

	}, 3000);

});

var ajaxGet = function ($path, header_note) {

	$.get($path, function(data) {

		var cropped_data = data.substr(1, 1);

		if (cropped_data != '0') {

			$('#new_messages').html(cropped_data);

			header_note.removeClass('label-success');
			header_note.addClass('label-danger');
			header_note.html(cropped_data);

			$(document).prop('title', 'New messages (' + cropped_data + ')');

			console.log('New Messages Loaded');
		}
	});

};