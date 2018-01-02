// JavaScript Document
jQuery( document ).ready(function() {
		
	/*google analytics event tracking.*/
	
	//jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Home page CTA Click', 'Click', 'Click through to form Top',4);});

	//jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Home page CTA Click', 'Click', 'Click through to form Middle',4);});
	
	
	function open_mobile_menu(){
		
		jQuery('#mobile-header-navbar-collapse').toggle( 'fold', 100);
		jQuery('#navbar').css("display","table");         
		jQuery("html,body").css('overflow','hidden');
		jQuery('.mobile-menu-container').show();
	}
	
	function close_mobile_menu(){
		
		jQuery('#mobile-header-navbar-collapse').toggle( 'fold', 100);
		jQuery('#navbar').css("display","table");         
		jQuery("html,body").css('overflow','auto');
		jQuery('.mobile-menu-container').toggle();
	}
	
	
	
	//url watcher..
	if(typeof(previous_url) == 'undefined'){ previous_url = document.location.href; }	
	url_watcher = function()
	{		
		if(document.location.href != previous_url)
		{			
			previous_url = document.location.href;
						
			//Hiding quote forms if opened previously
			hide_quoteform();
						
			//Hiding divs and loading quote form
			hide_divs();
			load_quote_form_from_menu();
			
			//Close mobile menu when there is no page refresh
			close_mobile_menu();
			
		}
	}

	if(typeof(url_watcher_interval) !='undefined') window.clearInterval(url_watcher_interval);
	url_watcher_interval = window.setInterval(url_watcher,500);
	
	
	function hide_divs(){
		
		jQuery("#hero").hide();
		jQuery("#article").hide();
		jQuery("#tp").hide();
		jQuery(".green_section").hide();
		jQuery("#how_will").hide();
		jQuery("#get_quotes").hide();
		jQuery("section.boxes").hide();
		jQuery("#locations").hide();
		jQuery("footer.main").hide();
		
	}
	
	function hide_quoteform(){
		jQuery("#show-after-get-business").hide();
		jQuery("#show-after-get-international").hide();
		jQuery("#show-after-get").hide();
	}
	
	function show_quote_form(business_type){
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
	}
	
	
	function load_quote_form_from_menu(){
		var form_type = document.location.href.split('#');
		var quote_form = '';
		if(form_type.length>1){
			
			quote_form = form_type[1].toLowerCase();
	
			
			if(quote_form == "hr" || quote_form == "or" || quote_form == "ir"){
				hide_divs();
				business_type = '';
				if(quote_form == "or") business_type = "Business Removal";
				if(quote_form == "ir") business_type = "International";
				
				
				show_quote_form(business_type);
			}
			
		}
	}
	
	//Loading the quote form 
	setTimeout(function(){ load_quote_form_from_menu();},1500);
	
	
	
	//For mobile menu doesn't go inside the admin bar
	if(jQuery('#wpadminbar').length>0){
		var admin_navbar_height = jQuery('#wpadminbar').height();
		jQuery('.mobile-menu-container .mobile-header-menu-close').css('top',admin_navbar_height+'px');
		jQuery('.mobile-menu-container #navbar').css('top',(admin_navbar_height-20)+'px');
	}
	
		
	//Mobile button Toggle Open
	jQuery("#navbar-toggle-btn").click(function () {
		open_mobile_menu();
	});
	
	//Toggle mobile menu (Close)
	jQuery("#mobile-header-menu-close-btn").click( function(){
		close_mobile_menu();
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

	
	//Blog Pages - floating header banner
	if( jQuery('#compare_quotes_banner').length > 0 ){
			
			var compare_quotes_banner = jQuery('#compare_quotes_banner');
			var before_compare_quotes_banner = jQuery('#before_compare_quotes_banner');
			var compare_quotes_banner_offset = before_compare_quotes_banner.offset().top;
			
			var is_float = false;
			var window_width = jQuery( window ).width();
			var temp_width = window_width;
			
			function float_quotes_banner(){
				var scroll_height = jQuery(window).scrollTop();
				
					if( (scroll_height > compare_quotes_banner_offset) && (!is_float)){
							jQuery('.empty-block').css({height: compare_quotes_banner.height()+"px"});
							compare_quotes_banner.css({position: "fixed", top: "0"});
							compare_quotes_banner.css("margin-top", "0px");
							is_float = true;
					}
					else if( (scroll_height <= compare_quotes_banner_offset) && is_float){
							compare_quotes_banner.css({position: "relative"});
							jQuery('.empty-block').css({height: 0, top: "0"});
							compare_quotes_banner.css("margin-top", "30px");
							is_float = false;
					}
			}
			
			jQuery( window ).resize(function() {
				window_width = jQuery( document ).width();
				if(window_width != temp_width){
					compare_quotes_banner_offset = before_compare_quotes_banner.offset().top;
					temp_width = window_width;
					is_float = false;
					float_quotes_banner();
				}
			});
			
			jQuery( document ).on("touchmove", function(){
				float_quotes_banner();
			});
			
			jQuery( window ).scroll(function(){
				float_quotes_banner();
			});
			
			float_quotes_banner();
			
		}

	
	
	jQuery(".get-my-quote").click(function(){
		
		hide_divs();
		
		var postcode_from = jQuery("#postcode_from").val();
		var postcode_to = jQuery("#postcode_to").val();
		
		var business_type = jQuery("input[name=business_type]:checked").val();
		
		show_quote_form(business_type);
		
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
		
		hide_divs();
		
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