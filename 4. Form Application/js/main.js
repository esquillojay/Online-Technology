$(document).ready(function() {

  var rectangle_results;
  var rectangle_modes;
  var rectangle_lengths;
  var rectangle_widths;

  var triangle_result;
  var triangle_mode;
  var triangle_base;
  var triangle_height;
  var tside1, tside2, tside3;
  
  var circle_result;
  var circle_mode;
  var circle_radius;

  // RECTANGLE
  $('#rec-compute').on('click', function() {

    rectangle_lengths = $('#rec-length').val();
    rectangle_widths = $('#rec-width').val();
    rectangle_modes = $('#rec-mode').val();

    if (rectangle_modes == 'Rec-Area') {
      rectangle_results = rectangle_lengths * rectangle_widths;
    } else {
      rectangle_results = (2 * rectangle_lengths) + (2 * rectangle_widths);
    }

    $('#rec-result').val(rectangle_results.toFixed(2));

  });

  $('#rec-mode').on('change', function() {

    rectangle_modes = $('#rec-mode').val();

    if (rectangle_modes == 'Rec-Area') {
      rectangle_modes = 'Rectangle - Area';
    } else {
      rectangle_modes = 'Rectangle - Perimeter';
    }
  
    $('#rec-legend').text(rectangle_modes);

  });

  // TRIANGLE
  $('#tri-compute').on('click', function() {

    triangle_base = Number($('#tri-base').val());
    triangle_height = Number($('#tri-height').val());
    triangle_mode = $('#tri-mode').val();
    tside1 = Number($('#tri-side1').val());
    tside2 = Number($('#tri-side2').val());
    tside3 = Number($('#tri-side3').val());

    if (triangle_mode == 'Tri-Area') {
      triangle_result = 0.5 * triangle_base * triangle_height;
    } else {
      triangle_result = tside1 + tside2 + tside3;
    }

    $('#tri-result').val(triangle_result.toFixed(2));

  });

  $('#tri-mode').on('change', function() {

    triangle_mode = $('#tri-mode').val();

    if (triangle_mode == 'Tri-Area') {
      $('.area-container').show();
      $('.per-container').hide();
      triangle_mode = 'Triangle - Area';
    } else {
      $('.area-container').hide();
      $('.per-container').show();
      triangle_mode = 'Triangle - Perimeter';
    }
  
    $('#tri-legend').text(triangle_mode);

  });

  // CIRCLE
  $('#cir-compute').on('click', function() {

    circle_radius = Number($('#cir-radius').val());
    circle_mode = $('#cir-mode').val();

    if (circle_mode == 'Cir-Area') {
      circle_result = Math.PI * Math.pow(circle_radius, 2);
    } else {
      circle_result = 2 * Math.PI * circle_radius;
    }

    $('#cir-result').val(circle_result.toFixed(2));

  });

  $('#cir-mode').on('change', function() {

    circle_mode = $('#cir-mode').val();

    if (circle_mode == 'Cir-Area') {
      circle_mode = 'Circle - Area';
    } else {
      circle_mode = 'Circle - Perimeter';
    }
  
    $('#cir-legend').text(circle_mode);

  });

});
