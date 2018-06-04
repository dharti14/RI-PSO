jQuery('document').ready(function() {
	
	results = '';
	plResponse = [];
	jQuery(auto_complete_plugin.selector).autoComplete({
		minChars: 1,		
		cache:true,	
		source: function(term,response) {
	    	var term = encodeURI(term); 
	    	try { xhr.abort(); } catch(e){}	     
        	xhr = jQuery.ajax({
	        "dataType": 'JSON', 
	        "type": "get", 
	        "url":postcode_lookup.ajaxurl, 
	        "data": {action: 'postcode_lookup',searchedKeyword:term},	        
	        "success":function(data,textStatus){
	        	if(data.statusCode == 200)
		        {	        	
		        	results = JSON.parse(data.results);	
		        	
		        	if(results != '' && results != null)
		        	{	
		        		plResponse = [];
		        		for (var key in results)
		        		{	        	
		        			plResponse.push(results[key].townName+' ('+results[key].districtName+')');	        	  
		        		} 
		        	}
		         }
	        	 else
	        	 {
	        		 plResponse = ["No Data Found"];	  
	        	 }
	        	
	        		response(plResponse);
	        		jQuery("body").trigger("onResponsePlItems");
		        }
		    }); 		
	        		
	       /*
	         
	         xhr = jQuery.ajax({url:postcode_lookup.ajaxurl, action: 'postcode_lookup',searchedKeyword:term },
	         function(data){	        	
		        if(data.statusCode == 200)
		        {	        	
		        	results = JSON.parse(data.results);		        		 
		        	if(results != '' && results != null)
		        	{	
		        		plResponse = [];
		        		for (var key in results)
		        		{	        	
		        			plResponse.push(results[key].townName+' ('+results[key].districtName+')');	        	  
		        		} 
		        	}
		         }	
	            else
	            {	
	            	plResponse = ["No Data Found"]	           	        		
	            }
	        	
	        	response(plResponse);
	        	jQuery("body").trigger("onResponsePlItems");
	        	
	          });*/
	        	
	        	
	        },
	        
	       onSelect: function (e, term, item) {
	    	   
	    	   jQuery("body").trigger("onSelectPlItem",[term]);
	    	   
	    	  /* if(typeof(postcodeLookupCallback) == "function")
	    	   {
	    		   postcodeLookupCallback(term);
	    	   }  */         
	        	
	        }
	        		
	  });  
	 
		
	
	  
	
	
});
