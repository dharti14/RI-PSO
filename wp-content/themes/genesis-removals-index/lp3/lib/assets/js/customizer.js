// JavaScript Document


function pl_displayCallback(data,elementId) {  
			//code for add name in "thank you" heading
			if(typeof(data)!='undefined')
			{
				if(typeof(data.firstName)!='undefined')
				{
					if(typeof(data.firstName.value)!='undefined')
					{
						jQuery('span#customername').html(data.firstName.value);
					}
				}
			}
}

jQuery( document ).ready(function() {
	
	active_business_type_class = '';

	
	if(typeof(ga) != "undefined")
	{	
	
	 jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});

	 jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});

	 jQuery("#get-my-quote-bottom").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Bottom',4); });
	
	}
	
	jQuery(".get-my-quote").click(function(){
		
		jQuery("div#dki").hide();
		jQuery("#hero").hide();
		jQuery("#how_will").hide();
		jQuery("#get_quotes").hide();
		jQuery("#tp").hide();
		jQuery(".green_section").hide();
		jQuery(".get_quotes2").hide();
		jQuery("#find_out_more").hide();
		jQuery("footer.main").hide();
		
		
		
		var postcode_from = jQuery("#postcode_from").val();
		var postcode_to = jQuery("#postcode_to").val();
		
		var business_type = jQuery("input[name=business_type]:checked").val();
		
		if(business_type == "International"){ postcode_to = ''; }
		
		var business_type_class = business_type.toLowerCase();
		
		if(business_type_class == "business removal")
		{
			business_type_class = "business";
		}	
		

		if(business_type == "Business Removal"){
			jQuery("#show-after-get-business").css("display","block");
			active_business_type_class = ".business";
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get-business').offset().top
    		}, 300);
		}else if(business_type == "International"){
			jQuery("#show-after-get-international").css("display","block");
			active_business_type_class = ".international";
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get-international').offset().top
    		}, 300);
		}else{	
			jQuery("#show-after-get").css("display","block");
			active_business_type_class = ".residential";
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get').offset().top
    		}, 300);
		}
		if(postcode_from != '')
		{
			if(postcode_from != '')
			{
				jQuery("."+business_type_class+" input[name=city]").addClass("pending");
				jQuery("."+business_type_class+" input[name=address]").addClass("pending");
				jQuery("."+business_type_class+" input[name=postcode]").addClass("pending");
			}
			
			jQuery.ajax({
			
			//type: 'get',
			dataType: 'json',
			url: post_code_address_object.ajaxurl,
			data: {action: "get_address_by_postcode", postcode_from : postcode_from},
			success: function(result){
				
				jQuery("."+business_type_class+" input[name=city]").val(result.town[0]);
				jQuery("."+business_type_class+" input[name=address]").val(result.line_1);
				jQuery("."+business_type_class+" input[name=postcode]").val(postcode_from);
				
					
					
				jQuery("."+business_type_class+" input:text").each(function(){
					jQuery(this).removeClass("pending");
					if (jQuery.trim(jQuery(this).val()).length != 0 && jQuery("."+business_type_class+" input[name=city]").val() != ""){
								
						jQuery(this).addClass("valid");
					}
					
				});
			}
	
		});	
	  }
		
	});
	
	
	jQuery(".get-my-quote2").click(function(){
		
		jQuery("div#dki").hide();
		jQuery("#hero").hide();
		jQuery("#how_will").hide();
		jQuery("#get_quotes").hide();
		jQuery("#tp").hide();
		jQuery(".green_section").hide();
		jQuery(".get_quotes2").hide();
		jQuery("#find_out_more").hide();
		jQuery("footer.main").hide();
		active_business_type_class = ".residential";
		var postcode_from = jQuery("#postcode_from2").val();
		var postcode_to = jQuery("#postcode_to2").val();
		
		
		jQuery("#show-after-get").css("display","block");
		jQuery('html, body').animate({
    		scrollTop: jQuery('#show-after-get').offset().top
		}, 300);
		
		
		jQuery.ajax({
			//type: 'post',
			dataType: 'json',
			url: post_code_address_object.ajaxurl,
			data: {action: "get_address_by_postcode", postcode_from : postcode_from},
			success: function(result){
					
					jQuery(".residential input[name=city]").val(result.town[0]);
					jQuery(".residential input[name=address]").val(result.line_1);			
					jQuery(".residential input[name=postcode]").val(postcode_from);
										
					jQuery(".residential input:text").each(function(){
						jQuery(this).removeClass("pending");
						if (jQuery.trim(jQuery(this).val()).length != 0 && jQuery(".residential input[name=city]").val() != ""){

							jQuery(this).addClass("valid");
							
						}
						
					});
			}
		
		});
		
	});
	
	jQuery(".get-my-quote3").click(function(){
		
		jQuery("div#dki").hide();
		jQuery("#hero").hide();
		jQuery("#how_will").hide();
		jQuery("#get_quotes").hide();
		jQuery("#tp").hide();
		jQuery(".green_section").hide();
		jQuery(".get_quotes2").hide();
		jQuery("#find_out_more").hide();
		jQuery("footer.main").hide();
		active_business_type_class = ".residential";
		var postcode_from = jQuery("#postcode_from3").val();
		var postcode_to = jQuery("#postcode_to3").val();
		
		
		jQuery("#show-after-get").css("display","block");
		jQuery('html, body').animate({
    		scrollTop: jQuery('#show-after-get').offset().top
		}, 300);
		
		
		jQuery.ajax({
			//type: 'post',
			dataType: 'json',
			url: post_code_address_object.ajaxurl,
			data: {action: "get_address_by_postcode", postcode_from : postcode_from},
			success: function(result){
				
					
					jQuery(".residential input[name=city]").val(result.town[0]);
					jQuery(".residential input[name=address]").val(result.line_1);			
					jQuery(".residential input[name=postcode]").val(postcode_from);
										
					jQuery(".residential input:text").each(function(){
						jQuery(this).removeClass("pending");
						if (jQuery.trim(jQuery(this).val()).length != 0 && jQuery(".residential input[name=city]").val() != ""){

							jQuery(this).addClass("valid");
							
						}
						
					});
			}
		
		});
		
	});
	
});