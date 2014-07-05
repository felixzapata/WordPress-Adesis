jQuery(document).ready(function($) {

	var formfield = null;

	$('#subir_imagen_modulo').click(function() {

		$('html').addClass('Image');
		formfield = $('#imgPie').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		set_send('#imgPie');
		return false;
	});


	$('#subir_imagen_modulo2').click(function() {

		$('html').addClass('Image');
		formfield = $('#imgPie2').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		set_send('#imgPie2');
		return false;
	});

	$('#subir_imagen_modulo3').click(function() {

		$('html').addClass('Image');
		formfield = $('#imgPie3').attr('name');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		set_send('#imgPie3');
		return false;
	});


	function set_send(field) {
		// store send_to_event so at end of function normal editor works
		window.original_send_to_editor = window.send_to_editor;
	 
		// override function so you can have multiple uploaders pre page
		window.send_to_editor = function(html) {
			imgurl = $('img',html).attr('src');
			$(field).val(imgurl);
			tb_remove();
			// Set normal uploader for editor
			window.send_to_editor = window.original_send_to_editor;
		};
	}

});