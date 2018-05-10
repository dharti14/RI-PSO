jQuery('document').ready(function() {
	
	results = '';
	plResponse = [];
	jQuery(auto_complete_plugin.selector).autoComplete({
		minChars: 1,		
		cache:true,	
		 source: function(term,response) {
	    	var term = encodeURI(term); 
	    	try { xhr.abort(); } catch(e){}
	        xhr = jQuery.getJSON(postcode_lookup.ajaxurl ,{ action: 'postcode_lookup',searchedKeyword:term }, 
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
	            	jQuery(auto_complete_plugin.selector).val("");	        		        		
	            	jQuery(auto_complete_plugin.selector).removeClass("valid");	        		
	            }
	        	
	        	response(plResponse);
	        	jQuery(auto_complete_plugin.selector).css({'background':'none'});
	        	
	          });
	        },
	        
	       onSelect: function (e, term, item) {
	    	   
	    	   if(typeof(postcodeLookupCallback) == "function")
	    	   {
	    		   postcodeLookupCallback(term);
	    	   }	    	   
	    	   
	           jQuery(auto_complete_plugin.selector).css({'background':'none'});
	           
	        	
	        }
	        		
	  });  
	 
		
	jQuery(auto_complete_plugin.selector).keyup(function(){   	 
		
		if(jQuery(this)[0].value != '')
		{	
			jQuery(this).css({'background': 'url("http://ri-dev.regur.in/wp-content/plugins/removals-index-quote-form/css/images/ajax-loader.gif") no-repeat','background-position': '97% center'});
			jQuery(this).removeClass("valid");
		}
		else
		{
			jQuery(this).css({'background':'none'});
		}	
		
	});  
		
	jQuery(auto_complete_plugin.selector).focusout(function() {		
		jQuery(this).css({'background':'none'});
		
	});
	  
	
	
});
