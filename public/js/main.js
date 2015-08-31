$(function() {
	$('[data-confirm]').on('click', function( e ) {
		if (! confirm($(this).attr('data-confirm'))) {
			e.preventDefault();
			e.cancelBubble = true;
		}
	});

	$('[data-toggle=collapse]').on('click', function( e ) {
		var target = $(this).attr('data-target');

		e.preventDefault();

		$(target).toggle();
	});

	$('[data-dismiss=timeout]').each(function() {
		var timeout_len = 2000,
			$dismiss_target = $(this);

		setTimeout(function()
		{
			$dismiss_target.slideToggle()
		}, timeout_len);
	});

	$('input[type=date]').pickadate({
		format: 'yyyy-mm-dd'
	});

	// @todo: This only works for submitting a submission right now. :/
	$('[data-post]').on('click', function(e) {
		e.preventDefault();
		var $that = $(this);

		$.ajax({
			url: "/submissions",
			type: "POST",
			data: $.parseJSON($(this).attr('data-post')),
			success: function() {
				// @todo flash message
				// @todo: Change binding
				$that.text('Submitted').removeClass('btn-primary').addClass('btn-default');
			}
		});
	});

	// @todo: This only works for deleting a submission right now. :/
	$('[data-delete]').on('click', function(e) {
		e.preventDefault();
		var $that = $(this);

		$.ajax({
			url: $that.attr('href'),
			type: "DELETE",
			data: $.parseJSON($(this).attr('data-delete')),
			success: function() {
				// @todo flash message
				// @todo: Change binding
				$that.text('Un-submitted').removeClass('btn-default').addClass('btn-primary');
			}
		});
	});

	$('.bio-modal').on('shown.bs.modal', function () {
		$(this).find('textarea').focus();
	});

	$('[data-clipboard]').each(function (i, element) {
		$(element).tooltip({
			trigger: 'manual',
			placement: 'bottom',
			title: 'Copied!'
		});

		var client = new ZeroClipboard(element);
		client.on("ready", function(readyEvent) {
			client.on("aftercopy", function(event) {
				$(element).tooltip('show');
				setTimeout(function () {
					$(element).tooltip('hide');
				}, 800);
			} );
		});
	});
});
