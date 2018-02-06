jQuery(document).ready(function(){

	jQuery('#nearesttown').autocomplete({
		 source: function(request, response) {
	    	var term = encodeURI(request.term); 
			jQuery.ajax({
			url: postcode_lookup.ajaxurl,
			type: "GET",
			data: {
				action: 'postcode_lookup',searchKeyword:term
			},
			dataType: "json",
			success: function(data){ 
				var datamap = data.map(function(i) {
				  return {
					    value: i.townName+' ('+i.districtName+')'
				  }
				});
				  	  datamap = datamap.filter(function(i) {
					  return i.value.toLowerCase().indexOf(term.toLowerCase()) >= 0;
				});
			    response(datamap);
			}
				  
			});
	  },
	  select: function (event, ui) {
			jQuery("#nearesttown").val(ui.item.label);
			jQuery("div.rightpart div.dontknow-exact-address").hide();
			jQuery("div.rightpart div.stress-moving-from").show();
			
			var searchKeyValue = jQuery('#nearesttown').val();
			jQuery('#postcodeto').val(searchKeyValue);
			return false;
		},
		
	  minLength: 1,
	  delay: 100
	});
	
});
