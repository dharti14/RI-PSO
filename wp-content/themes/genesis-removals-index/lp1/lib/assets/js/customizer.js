// JavaScript Document
jQuery( document ).ready(function() {
			
	jQuery(".get-my-quote").click(function(){
		
		jQuery(".looking-for").hide();
		jQuery(".will-removal").hide();
		//jQuery("#hide-after-get").hide();
		jQuery(".free-quotes-now").hide();
		jQuery(".slide-main").hide();
		jQuery(".companies").hide();
		jQuery(".find-experts").hide();
		jQuery(".footer").hide();
		var postcode_from = jQuery("#postcode_from").val();
		var postcode_to = jQuery("#postcode_to").val();
		var buseness_type = jQuery("input[name=buseness_type]:checked").val();
			if(buseness_type == "International"){ postcode_to = ''; }
		//var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
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
			url: addressObject.ajaxurl,
			data: {action: "getAddressByPostCode", postcode_from : postcode_from, postcode_to : postcode_to},
			success: function(result){
				
				var json_obj = result;
				
				//console.log(json_obj.length);
				
				//If result is not empty
				if(json_obj != 0){	
				
					jQuery("input[name=city]").val(json_obj.town[0]);
					jQuery("input[name=address]").val(json_obj.line_1);
					jQuery("input[name=city_to]").val(json_obj.town_to[0]);
					jQuery("input[name=address_to]").val(json_obj.line_1_to);
				
				}
				
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
		//var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		jQuery(".looking-for").hide();
		jQuery(".will-removal").hide();
		//jQuery("#hide-after-get").hide();
		jQuery(".free-quotes-now").hide();
		jQuery(".slide-main").hide();
		jQuery(".companies").hide();
		jQuery(".find-experts").hide();
		jQuery("#show-after-get").css("display","block");
		jQuery('html, body').animate({
        	scrollTop: jQuery('#show-after-get').offset().top
    	}, 300);
		
		//display footer and menu below plugin
		jQuery(".footer").css("display","block");
		
		
		jQuery.ajax({
			//type: 'post',
			dataType: 'json',
			url: addressObject.ajaxurl,
			data: {action: "getAddressByPostCode", postcode_from : postcode_from, postcode_to : postcode_to},
			success: function(result){
				
				var json_obj = result;
				
				//If result is not empty
				if(json_obj != 0){	
					
					jQuery("input[name=city]").val(json_obj.town[0]);
					jQuery("input[name=address]").val(json_obj.line_1);
					jQuery("input[name=city_to]").val(json_obj.town_to[0]);
					jQuery("input[name=address_to]").val(json_obj.line_1_to);
				
				}
				
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
		//var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		jQuery(".looking-for").hide();
		jQuery(".will-removal").hide();
		//jQuery("#hide-after-get").hide();
		jQuery(".free-quotes-now").hide();
		jQuery(".slide-main").hide();
		jQuery(".companies").hide();
		jQuery(".find-experts").hide();
		jQuery("#show-after-get").css("display","block");
		jQuery('html, body').animate({
        	scrollTop: jQuery('#show-after-get').offset().top
    	}, 300);
		
		
		//display footer and menu below plugin
		jQuery(".footer").css("display","block");
		
		
		jQuery.ajax({
			//type: 'post',
			dataType: 'json',
			url: addressObject.ajaxurl,
			data: {action: "getAddressByPostCode", postcode_from : postcode_from, postcode_to : postcode_to},
			success: function(result){
				
				var json_obj = result;
				
				//If result is not empty
				if(json_obj != 0){	
					
					jQuery("input[name=city]").val(json_obj.town[0]);
					jQuery("input[name=address]").val(json_obj.line_1);
					jQuery("input[name=city_to]").val(json_obj.town_to[0]);
					jQuery("input[name=address_to]").val(json_obj.line_1_to);
				
				}
				
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