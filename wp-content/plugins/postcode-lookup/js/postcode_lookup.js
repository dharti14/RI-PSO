jQuery( document ).ready(function() {
	var url = jQuery('#postcode_lookup_url').val();
	var api = jQuery('#postcode_lookup_api').val();
	
	jQuery('#nearesttown').autocomplete({
			
	     source: function(request, response) {
	    	 var term = request.term; 
			 var restUrl = url+term+'/'+api;
			 jQuery.getJSON(decodeURI(restUrl), function (data) {
			 
				  var datamap = data.map(function(i) {
				  return {
					    value: i.townName + ' ('+i.districtName+')'
				  }
				});
				  	  datamap = datamap.filter(function(i) {
					  return i.value.toLowerCase().indexOf(term.toLowerCase()) >= 0;
				});
			    response(datamap);
			});
	  },
	  minLength: 1,
	  delay: 100
	});
	
	
	//hide show div.
	
});