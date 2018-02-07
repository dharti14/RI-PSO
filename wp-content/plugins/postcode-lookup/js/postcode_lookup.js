jQuery('document').ready(function() {
	
	
	plResponse = [];
	jQuery('#nearesttown').autoComplete({
		minChars: 1,		
		cache:true,	
		 source: function(term,response) {
	    	var term = encodeURI(term); 
	    	try { xhr.abort(); } catch(e){}
	        xhr = jQuery.getJSON(postcode_lookup.ajaxurl ,{ action: 'postcode_lookup',searchedKeyword:term }, 
	        function(data){
	        	if(data != '' && data != null)
	        	{	
	        		plResponse = [];
	        		for (var key in data)
	        		{	        	
	        			plResponse.push(data[key].townName+' ('+data[key].districtName+')');	        	  
	        		} 
	        	}
	        	else
	        	{
	        		plResponse = ["No Data Found"]
	        	}
	        	
	        	response(plResponse);
	        	jQuery('#nearesttown').css({'background':'none'});
	          });
	        },
	        
	       onSelect: function (e, term, item) {
	        	
	    	   if(typeof(term) != "undefined" && term != '')
	    	   {       		
		        	//jQuery("#nearesttown").val(ui.item.label);
					jQuery("div.rightpart div.dontknow-exact-address").hide();
					jQuery("div.rightpart div.stress-moving-from").show();				
					jQuery('#postcodeto').val(term);
				}
	        	jQuery('#nearesttown').css({'background':'none'});
	        	
	        }
	        		
	  });  
	 
		
	jQuery("#nearesttown").keyup(function(){   	 
		
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
		
	jQuery("#nearesttown").focusout(function() {		
		jQuery(this).css({'background':'none'});
	});
	  
	
	
});
