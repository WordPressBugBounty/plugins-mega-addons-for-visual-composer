jQuery(document).ready(function() {
	jQuery('#addonsdata, .btn-save').submit(function(event) {
		jQuery('.nm-saved').hide();
		jQuery('.nm-error').hide().text('');
		jQuery('.nm-loading').show();
		jQuery('.nm-status').text('Saving settings.');
		event.preventDefault();
		var data = jQuery(this).serialize();
		data = data + '&action=vc_save_data';
		function showError(resp) {
			var message = jQuery('.nm-error').attr('data-default-message');
			if (resp && resp.data && typeof resp.data.message === 'string') {
				message = resp.data.message;
			}
			jQuery('.nm-saved').hide();
			jQuery('.nm-error').text(message).show();
			jQuery('.nm-status').text('');
		}
		jQuery.post(ajaxurl, data, null, 'json').done(function(resp) {
			if (resp && resp.success === true) {
				jQuery('.nm-error').hide().text('');
				jQuery('.nm-saved').show();
				jQuery('.nm-status').text('Changes Saved!');
			} else {
				showError(resp);
			}
		}).fail(function(xhr) {
			showError(xhr.responseJSON);
		}).always(function() {
			jQuery('.nm-loading').hide();
		});
	});
});
