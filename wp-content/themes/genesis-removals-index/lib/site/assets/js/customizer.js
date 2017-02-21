// JavaScript Document
jQuery( document ).ready(function() {
		
	/*google analytics event tracking.*/	
	
	//For mobile menu doesn't go inside the admin bar
	if(jQuery('#wpadminbar').length>0){
		var admin_navbar_height = jQuery('#wpadminbar').height();
		jQuery('.mobile-menu-container .mobile-header-menu-close').css('top',admin_navbar_height+'px');
		jQuery('.mobile-menu-container #navbar').css('top',(admin_navbar_height-20)+'px');
	}
	
	
	var mobile_navbar = jQuery('#mobile-header-navbar-collapse');
	var mobile_menu_container = jQuery('.mobile-menu-container');
	
	//Mobile button Toggle Open
	jQuery("#navbar-toggle-btn").click(function () {
		// Set the effect type
		var effect = 'fold';

		mobile_navbar.toggle( effect, 100);
			jQuery('#navbar').css("display","table");         
			jQuery("html,body").css('overflow','hidden');
			jQuery('.mobile-menu-container').show();
	    });
	
	//Toggle mobile menu (Close)
	jQuery("#mobile-header-menu-close-btn").click( function(){
		// Set the effect type
		var effect = 'slide';
		
		mobile_navbar.toggle( effect, 100);
		jQuery('#navbar').css({"display":"table"});         
		jQuery("html,body").css('overflow','auto');
		mobile_menu_container.toggle();
	});	
	
	var submenu_item = jQuery('.menu-item-has-children');
	submenu_item.mouseenter(
			function () {
				//show its submenu
				jQuery(this).children('ul.sub-menu').slideDown(300);
			}
	);
	submenu_item.mouseleave(
			function () {
				//hide its submenu
				jQuery(this).children('ul.sub-menu').slideUp(300);
			}
	);
	
	//For Silo content pages only
	function ri_align_banner_image(){
		
		var window_width = jQuery(window).width();
		var image_width = jQuery('.silo_banner_image').width();
		
		var image_css = (window_width/2)-(image_width/2);
			
		jQuery('.silo_banner_image').css('left',image_css+"px");
		
	}

	jQuery(window).load(function($){
		ri_align_banner_image();
	});

	jQuery(window).resize(function($){
		ri_align_banner_image();
	});
	//For Silo content pages only
	
	jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});
	jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});
	
	/*google analytics event tracking.*/	
	
	jQuery(".get-my-quote").click(function(){
		
		jQuery("#hero").hide();
		jQuery("#article").hide();
		jQuery("#tp").hide();
		jQuery(".green_section").hide();
		jQuery("#how_will").hide();
		jQuery("#get_quotes").hide();
		jQuery("section.boxes").hide();
		jQuery("#locations").hide();
		jQuery("footer.main").hide();
		
		var postcode_from = jQuery("#postcode_from").val();
		var postcode_to = jQuery("#postcode_to").val();
		
		var business_type = jQuery("input[name=business_type]:checked").val();
		
		if(business_type == "International"){ postcode_to = ''; }
		if(business_type == "Business Removal"){
			jQuery("#show-after-get-business").css("display","block");
			jQuery('html, body').animate({
        		scrollTop: jQuery('#show-after-get-business').offset().top
    		}, 300);
		}else if(business_type == "International"){
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
		
		jQuery("#how_will").hide();
		jQuery("#article").hide();
		jQuery("#tp").hide();
		jQuery(".green_section").hide();
		jQuery("#hero").hide();
		jQuery("#get_quotes").hide();
		jQuery("#locations").hide();
		jQuery("section.boxes").hide();
		jQuery("footer.main").hide();
		
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