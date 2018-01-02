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
		
	//jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});

	//jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});

	//jQuery("#get-my-quote-bottom").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Bottom',4); });
	
			
	jQuery(".get-my-quote").click(function(){
		
		jQuery(".looking-for").hide();
		jQuery(".will-removal").hide();

		jQuery(".free-quotes-now").hide();
		jQuery(".slide-main").hide();
		jQuery(".companies").hide();
		jQuery(".find-experts").hide();
		jQuery(".footer").hide();
		var postcode_from = jQuery("#postcode_from").val();
		var postcode_to = jQuery("#postcode_to").val();
		var buseness_type = jQuery("input[name=buseness_type]:checked").val();
			if(buseness_type == "International"){ postcode_to = ''; }
			
		if(buseness_type == "Business Removal"){
			jQuery("#show-after-get-business").css("display","block");
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get-business').offset().top
    		}, 300);
		}else if(buseness_type == "International"){
			jQuery("#show-after-get-international").css("display","block");
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get-international').offset().top
    		}, 300);
		}else{	
			jQuery("#show-after-get").css("display","block");
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get').offset().top
    		}, 300);
		}
				
		jQuery.ajax({
			
			//type: 'get',
			dataType: 'json',
			url: post_code_address_object.ajaxurl,
			data: {action: "get_address_by_postcode", postcode_from : postcode_from, postcode_to : postcode_to},
			success: function(result){
				
				
					jQuery("input[name=city]").val(result.town[0]);
					jQuery("input[name=address]").val(result.line_1);
					jQuery("input[name=city_to]").val(result.town_to[0]);
					jQuery("input[name=address_to]").val(result.line_1_to);
				
				
					jQuery("input[name=postcode]").val(postcode_from);
					jQuery("input[name=postcode_to]").val(postcode_to);
					
					jQuery("input:text").each(function(){
						if (jQuery.trim(jQuery(this).val()).length != 0){
							jQuery(this).addClass("valid");
							
						}
						
					});
			}
	
		});				
	});

	
	jQuery(".get-my-quote2").click(function(){

		var postcode_from = jQuery("#postcode_from2").val();
		var postcode_to = jQuery("#postcode_to2").val();

		jQuery(".looking-for").hide();
		jQuery(".will-removal").hide();
		jQuery(".free-quotes-now").hide();
		jQuery(".slide-main").hide();
		jQuery(".companies").hide();
		jQuery(".find-experts").hide();
		jQuery(".footer").hide();
		jQuery("#show-after-get").css("display","block");
		jQuery('html, body').animate({
        	scrollTop: jQuery('#show-after-get').offset().top
    	}, 300);
		
		
		jQuery.ajax({
			//type: 'post',
			dataType: 'json',
			url: post_code_address_object.ajaxurl,
			data: {action: "get_address_by_postcode", postcode_from : postcode_from, postcode_to : postcode_to},
			success: function(result){
			
					
					jQuery("input[name=city]").val(result.town[0]);
					jQuery("input[name=address]").val(result.line_1);
					jQuery("input[name=city_to]").val(result.town_to[0]);
					jQuery("input[name=address_to]").val(result.line_1_to);
				
				
					jQuery("input[name=postcode]").val(postcode_from);
					jQuery("input[name=postcode_to]").val(postcode_to);
					
					jQuery("input:text").each(function(){
						if (jQuery.trim(jQuery(this).val()).length != 0){
							jQuery(this).addClass("valid");
							
						}
						
					});
			}
		
		});
						
	});
	
	jQuery(".get-my-quote3").click(function(){

		var postcode_from = jQuery("#postcode_from3").val();
		var postcode_to = jQuery("#postcode_to3").val();

		jQuery(".looking-for").hide();
		jQuery(".will-removal").hide();

		jQuery(".free-quotes-now").hide();
		jQuery(".slide-main").hide();
		jQuery(".companies").hide();
		jQuery(".find-experts").hide();
		jQuery(".footer").hide();
		jQuery("#show-after-get").css("display","block");
		jQuery('html, body').animate({
        	scrollTop: jQuery('#show-after-get').offset().top
    	}, 300);
		
				
		jQuery.ajax({
			//type: 'post',
			dataType: 'json',
			url: post_code_address_object.ajaxurl,
			data: {action: "get_address_by_postcode", postcode_from : postcode_from, postcode_to : postcode_to},
			success: function(result){
				
					
					jQuery("input[name=city]").val(result.town[0]);
					jQuery("input[name=address]").val(result.line_1);
					jQuery("input[name=city_to]").val(result.town_to[0]);
					jQuery("input[name=address_to]").val(result.line_1_to);
				
				
					jQuery("input[name=postcode]").val(postcode_from);
					jQuery("input[name=postcode_to]").val(postcode_to);
					
					jQuery("input:text").each(function(){
						if (jQuery.trim(jQuery(this).val()).length != 0){
							jQuery(this).addClass("valid");
							
						}
						
					});
			}
		
		});
				
	});
	
});



jQuery(window).load(function(){
	jQuery('dd').hide();

	jQuery('dt').click(
    function() {
        var toggle = jQuery(this).nextUntil('dt');
        toggle.slideToggle();
        jQuery('dd').not(toggle).slideUp();
    });
});
