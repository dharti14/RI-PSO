function ri_set_title_text_for_silo_page(){
	
	var schema_text = jQuery("#_schema_header_text").val();
	var header_text = jQuery("#_header_text").val();
	
	if(schema_text == "" || schema_text == " "){
		schema_text = 'xxxx';
	}
	
	if(header_text == "" || header_text == " "){
		header_text = 'yyyy';
	}
	
	jQuery('#schema_text').text(schema_text);
	jQuery('#header_text').text(header_text);
	
}


jQuery(document).ready(function() {
	jQuery( "#_schema_header_text,#_header_text" ).keyup(function() {
		ri_set_title_text_for_silo_page();
	});	
	
});


jQuery(window).load(function(){
	ri_set_title_text_for_silo_page();
});