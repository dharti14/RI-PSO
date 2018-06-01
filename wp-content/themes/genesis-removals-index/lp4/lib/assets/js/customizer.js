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
	
	active_business_type_class = '.residential';	
	
	if(typeof(ga) != "undefined")
	{	
	
	 jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});

	 jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});

	 jQuery("#get-my-quote-bottom").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Bottom',4); });
	
	}
	
	jQuery(".get-my-quote").click(function(){
		
		postcode_from = jQuery("#postcode_from").val();
		onclickGetQuoteBtn(postcode_from);
		
	});
	
	
	jQuery(".get-my-quote2").click(function(){		
	
		var postcode_from = jQuery("#postcode_from2").val();
		onclickGetQuoteBtn(postcode_from);
		
	});
	
	jQuery(".get-my-quote3").click(function(){
				
		var postcode_from = jQuery("#postcode_from3").val();
		onclickGetQuoteBtn(postcode_from);
			
	});
	
});


function onclickGetQuoteBtn(postcode_from)
{
	

	jQuery("div#dki").hide();
	jQuery("#hero").hide();
	jQuery("#how_will").hide();
	jQuery("#get_quotes").hide();
	jQuery("#tp").hide();
	jQuery(".green_section").hide();
	jQuery(".get_quotes2").hide();
	jQuery("#find_out_more").hide();
	jQuery("footer.main").hide();
	
	jQuery("#show-after-get").css("display","block");
	jQuery('html, body').animate({
		scrollTop: jQuery('#show-after-get').offset().top
	}, 300);
	
	if(postcode_from != '')
	{
		
		jQuery("."+business_type_class+" input[name=city]").addClass("pending");
		jQuery("."+business_type_class+" input[name=address]").addClass("pending");
		jQuery("."+business_type_class+" input[name=postcode]").addClass("pending");
		
		
		jQuery.ajax({
		
		//type: 'get',
		dataType: 'json',
		url: post_code_address_object.ajaxurl,
		data: {action: "get_address_by_postcode", postcode_from : postcode_from},
		success: function(result){
			
			jQuery(active_business_type_class+" input[name=city]").val(result.town[0]);
			jQuery(active_business_type_class+" input[name=address]").val(result.line_1);
			jQuery(active_business_type_class+" input[name=postcode]").val(postcode_from);
			
				
				
			jQuery(active_business_type_class+" input:text").each(function(){
				jQuery(this).removeClass("pending");
				if (jQuery.trim(jQuery(this).val()).length != 0 && jQuery(active_business_type_class+" input[name=city]").val() != ""){
							
					jQuery(this).addClass("valid");
				}
				
			});
		}

	});	
  }
	
	
}