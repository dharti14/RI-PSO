jQuery( document ).ready(function() {
		$('#nearesttown').autocomplete({
	     source: function(request, response) {
			 var term = request.term; 
	         var restUrl = 'http://pinlocal5-dev278.rollingcodes.io/api/postcodelookup/'+term+'/097fa9b1217773bab93615c95dc5dd86';
			 jQuery.getJSON(restUrl, function (data) {
			 
				  var datamap = data.map(function(i) {
				  return {
					    value: i.townName + ' (' + i.districtName+')'
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
});