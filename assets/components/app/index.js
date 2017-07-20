(function($) {
	$(window).on('load', function() {
		// on load hide all edit-elems
		$('.edit-elem').hide();
		$('.edit').hide();
		$('.editor-check').hide();
		$('#about-done-edit-button').hide();

		$('#about-edit-button').on('click', function() {
			var allEditElements = $('.edit-elem');
			var editButton = $(this);
			var doneEditButton = $('#about-done-edit-button');

			allEditElements.show();
			editButton.hide();
			doneEditButton.show();
		});

		$('#about-done-edit-button').on('click', function() {
			var allEditElements = $('.edit-elem');
			var editButton = $('#about-edit-button');
			var doneEditButton = $(this);

			allEditElements.hide();
			editButton.show();
			doneEditButton.hide();

			$('.display').show();
			$('.edit').hide();
		});

		$('.editor-pencil').on('click', function() {
			var editorTarget = $(this).data('target');
			$(editorTarget + ' .display').hide();
			$(editorTarget + ' .edit').show();
			$(editorTarget + ' .editor-check').show();
			$(this).hide();
		});

		$('.editor-check').on('click', function() {
			var editorTarget = $(this).data('target');
			$(editorTarget + ' .display').show();
			$(editorTarget + ' .edit').hide();
			$(editorTarget + ' .editor-pencil').show();
			$(this).hide();
		});
	});
})(jQuery);