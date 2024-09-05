var request = null;
$(document).ready(function() {

/* INSERT YOUR CODE HERE */

    // Initial form and data loading
    $('#formemployee').load('ajax/load_create_form.php');
    load_data();

    // department change
    $('body').on('change', '#departmentid', function() {
        var departmentid = $(this).val();
        $.post('ajax/load_program.php', {departmentid: departmentid}, function(response) {
            $('#programid').html(response).prop('disabled', false);
        });
    });

    // form submission
    $('body').on('submit', '#formemployee.create-form', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'ajax/add_data.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function() {
                $('#formemployee').load('ajax/load_create_form.php'); // Reload create form
                load_data(); // Reload other data as needed
                reset_form(); // Optionally reset the form
            }
        });
    });

    // search input
    $('#search').on('keyup', function() {
        var search = $(this).val();
        if (request) clearTimeout(request);
        request = setTimeout(function() {
            $.post('ajax/load_search.php', {search: search}, function(response) {
                $('#employee-table').html(response);
                request = null;
            });
        }, 1000);
    });

    // delete action
    $('body').on('click', '#delete', function() {
        var employeeid = $(this).attr('data-employeeid');
        if (confirm('Are you sure?')) {
            $.post('ajax/delete_data.php', {employeeid: employeeid}, function(response) {
                $('#error').html(response);
                load_data();
                reset_form();
            });
        }
    });

    // update action
    $('body').on('click', '#update', function() {
        var employeeid = $(this).attr('data-employeeid');
        $.post('ajax/update_data.php', {employeeid: employeeid}, function(response) {
            $('#formemployee').html(response);
        });
    });

    // photo upload form submission
    $('body').on('submit', '#formemployee.upload-form', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'ajax/upload_photo.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function() {
                load_data();
                reset_form();
                $('#formemployee').load('ajax/load_create_form.php')
                                  .removeClass('upload-form')
                                  .addClass('create-form');
                $('#live-search').show();
                $('#employee-table').show();
            }
        });
    });

    // updating form
    $('body').on('submit', '#formemployee.update-form', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.post('ajax/update_data.php', formData, function() {
            $('#live-search').show();
            $('#search').val('');
            $('#employee-table').show();
            $('#formemployee').load('ajax/load_create_form.php')
                               .removeClass('update-form')
                               .addClass('create-form');
            load_data();
        });
    });

    // photo upload button click
    $('body').on('click', '#upload-photo', function() {
        var employeeid = $(this).attr('data-employeeid');
        $.post('ajax/load_upload_form.php', {employeeid: employeeid}, function(response) {
            $('#formemployee').removeClass('create-form')
                              .addClass('upload-form')
                              .html(response);
            $('#live-search').hide();
            $('#employee-table').hide();
        });
    });

    // update form button click
    $('body').on('click', '#update-form', function() {
        var employeeid = $(this).attr('data-employeeid');
        var departmentid = $(this).attr('data-departmentid');
        $.post('ajax/load_update_form.php', {employeeid: employeeid, departmentid: departmentid}, function(response) {
            $('#formemployee').removeClass('create-form')
                              .addClass('update-form')
                              .html(response);
            $('#live-search').hide();
            $('#employee-table').hide();
        });
    });

    // Prevent live search form submission
    $('#live-search').submit(function(event) {
        event.preventDefault();
    });

    // hover over name
    $('body').on('mouseover', '.hover-name', function() {
      var photo = $(this).attr('data-photo');
      var offset = $(this).offset();
      var defaultPhoto = 'no photo.jpg'; // Default photo in img folder
      var photoToShow = photo && photo !== 'no photo.jpg' ? 'photos/' + photo : 'img/' + defaultPhoto;
      
      $('#tooltip').html('<img src="' + photoToShow + '" style="width: 100%; height: 100%;">')
                   .css({top: offset.top - 210 + 'px', left: offset.left + 20 + 'px', display: 'block'});
  });

    // mouse out from name
    $('body').on('mouseout', '.hover-name', function() {
        $('#tooltip').hide();
    });


    /* CUSTOM FUNCTION */
    
    function load_data() {
        $('#employee-table').load('ajax/load_table.php');
    }

    function reset_form() {
        $('#formemployee')[0].reset();
    }
});
