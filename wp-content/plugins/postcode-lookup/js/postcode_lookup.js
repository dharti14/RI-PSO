jQuery(document).ready(function($){

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
	  minLength: 1,
	  delay: 100
	});
});
