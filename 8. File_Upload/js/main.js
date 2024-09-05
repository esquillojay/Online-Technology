$(document).ready(function() {

	// Show Data
	load_data();

	// Create Data
	$('body').on('submit', '#formstudent.create-form', function(event) {

		event.preventDefault(); // prevent form submission behavior
		
		var formData = new FormData(this); // This refers to the form element

		$.ajax({

			type: 'POST',
			url: 'ajax/add_data_md5.php',
			data: formData,
			processData: false, // need to set this when using file upload
			contentType: false, // need to set this when using file upload
			success: function(response) {

				load_data();
				reset_form();
			
			}

		});

	});

	// Delete Data
	$('body').on('click', '#delete', function(event) {

		var studentid = $(this).attr('data-studentid');

		if (confirm('Are you Sure?')) {

			$.ajax({

				type: 'POST',
				url: 'ajax/delete_data.php',
				data: {studentid: studentid},
				success: function(response) {
	
					$('#error').html(response);
					load_data();
					reset_form();
	
				}
	
			});

		}

	});

	// Hover on Name
	$('body').on('mouseover', '.hover-name', function() {

		var photo = $(this).attr('data-photo'); // Get the assigned photo
		var offset = $(this).offset(); // Get the position of the element on screen

		$('#tooltip').html('<img src="photos/' + photo + '" + style="width: 100%; height: 100%;">');
		$('#tooltip').css({top: offset.top - 210 + 'px', left: offset.left + 20 + 'px', display: 'block'});

	});

	// Hover out on Name
	$('body').on('mouseout', '.hover-name', function() {

		$('#tooltip').hide();

	});

	function load_data() {

		$('#student-table').load('ajax/load_table.php');

	}

	function reset_form() {

		$('#formstudent')[0].reset();

	}

});