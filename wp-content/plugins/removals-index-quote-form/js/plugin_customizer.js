// JavaScript Document
jQuery( document ).ready(function() {
		
		function phoneValidation(key) {
			var error = 0;
			var phoneLength = jQuery(this).val().length;
			var firsTwoValue = jQuery(this).val().substring(0, 2);
			var firsFourValue = jQuery(this).val().substring(0, 4);
			var validateArr = [ '01', '02', '03', '05', '07', '08', '09', '44', '+' ];
			if(validateArr.indexOf( firsTwoValue )<0){ 
				error = 1;
			}else{
				error = 0;
			}
        	if((key.charCode < 48 || key.charCode > 57) && key.charCode != 0 && key.charCode != 43){ 
				error = 1;
				return false;
			}else{
				error = 0;
			}
			if((firsTwoValue == 07 && phoneLength == 11) && key.charCode != 0){
				error = 1;
				return false;
			}else{
				error = 0;
			}
			if((firsFourValue == '+447' && phoneLength == 13) && key.charCode != 0){
				error = 1;
				return false;
			}else{
				error = 0;
			}
			if(error = 1){
				jQuery(this).removeClass("valid");
				jQuery(this).addClass("error");
			}else{
				jQuery(this).addClass("valid");
				jQuery(this).removeClass("error");
			}
        }
		
	jQuery.validator.addMethod("phoneValidate", function (phone_number, element) {
            phone_number = phone_number;
			
			var phoneLength = phone_number.length;
			var firsTwoValue = phone_number.substring(0, 2);
			var firsOneValue = phone_number.substring(0, 1);
			var firsFourValue = phone_number.substring(0, 4);
			
			var validateArr = [ '01', '02', '03', '05', '07', '08', '09', '44', '+'];
			//alert(firsTwoValue);
			if(firsTwoValue == '07'){
				 return this.optional(element) || phoneLength == 11 && validateArr.indexOf( firsTwoValue )>=0;
			}else if(firsFourValue == '+447'){
				 return this.optional(element) || phoneLength == 13;
			}else{
				 return this.optional(element) || phoneLength > 8 || validateArr.indexOf( firsOneValue )>=0 && 
				 		validateArr.indexOf( firsTwoValue )>=0;
			}
        }, "Invalid phone number");
			
	jQuery("#form input[name='phone']").keypress(phoneValidation);
		
        //form validation rules
        jQuery("#form").validate({
                rules: {
					bedrooms: "required",
                    name: "required",
					phone: "required",
					postcode: "required",
					address: "required",
                    city: "required",
					city_to: "required",
					packing_service: "required",
					dismantle : "required",
					storage : "required",
					date: "required",
					
                    email: {
                        required: true,
                        email: true
                    },
					phone: {
                        required: true,
						
						phoneValidate:true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    agree: "required"
                },
                messages: {
					bedrooms: "Size of current property is required",
                    name: "Your name is required",
                    phone: "Please enter a valid phone number",
					email: "Your email address is required",
                  	postcode: "Your post code address is required",
					address: "Your address is required",
                    city: "Your city is required",
					city_to: "Your city is required",
					packing_service: "Packing service is required",
                    dismantle: "Dismantle / Reassemble is required",
					storage: "Storage is required",
					date: "Anticipated moving date is required",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

    	
		jQuery(".get-my-quote-second").click(function() {
			//alert("form submitted");
    		jQuery("#form").submit();
    		//alert("form submitted2");
    		
 		 });
		 
	 	jQuery('#form input').keydown(function(e) {
			if (e.keyCode == 13) {
    			jQuery("#form").submit();
			}
 		 });
	
	jQuery('.bed-radios-container').click(function(){
		jQuery('.bed-radios-container').removeClass("bed-radios-container-sel");
		
		if(jQuery(this).attr("rel") == "bed0"){
			
			jQuery(".step-4-checkbox span").remove();
			jQuery(".step-4-checkbox").append('<span class="vaild-check valid"></span>');
			jQuery('#greenwood_drive2').show();
			jQuery("input[name='any_addition_information']").attr( 'checked', 'checked' );
			
		}else{
			jQuery(this).addClass("bed-radios-container-sel");
		}
		
		jQuery(this).find("input[type='radio']").prop("checked", true);
		jQuery(".removing-stress-frm h4.property span").remove();
		jQuery(".removing-stress-frm h4.property").append('<span class="vaild-check valid"></span>');
	});
	
	jQuery("#show-after-get input[name='property_type_from']").click(function(){
		if(jQuery(this).val() == "Apartment / Flat"){
			jQuery("#show-after-get #appartment-floor-from").css("display","block");
			jQuery("#show-after-get select[name='floor_from']").prop("required",true);
			jQuery("#show-after-get input[name='lift_available_from']").prop("required",true);
		}else{
			jQuery("#show-after-get #appartment-floor-from").css("display","none");
			jQuery("#show-after-get select[name='floor_from']").prop("required",false);
			jQuery("#show-after-get input[name='lift_available_from']").prop("required",false);
		}
		
		jQuery("#show-after-get .leftpart .redio-with-text h5 span").remove();
		jQuery("#show-after-get .leftpart .redio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
		
	});
	
	jQuery("#show-after-get input[name='property_type_to']").click(function(){
		if(jQuery(this).val() == "Apartment / Flat"){
			jQuery("#show-after-get #appartment-floor-to").css("display","block");
			jQuery("#show-after-get select[name='floor_to']").prop("required",true);
			jQuery("#show-after-get input[name='lift_available_to']").prop("required",true);
		}else{
			jQuery("#show-after-get #appartment-floor-to").css("display","none");
			jQuery("#show-after-get select[name='floor_to']").prop("required",false);
			jQuery("#show-after-get input[name='lift_available_to']").prop("required",false);
		}
		jQuery("#show-after-get .rightpart .redio-with-text h5 span").remove();
		jQuery("#show-after-get .rightpart .redio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
		
	});
	
	jQuery("#show-after-get input[name='lift_available_from']").click(function(){
		jQuery("#show-after-get .leftpart .redio-with-text2 span").remove();
		jQuery("#show-after-get .leftpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("#show-after-get input[name='lift_available_to']").click(function(){
		jQuery("#show-after-get .rightpart .redio-with-text2 span").remove();
		jQuery("#show-after-get .rightpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("#show-after-get input[name='parking_available_from']").click(function(){
		jQuery("#show-after-get .leftpart .redio-with-text3 span").remove();
		jQuery("#show-after-get .leftpart .redio-with-text3").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("#show-after-get input[name='parking_available_to']").click(function(){
		jQuery("#show-after-get .rightpart .redio-with-text3 span").remove();
		jQuery("#show-after-get .rightpart .redio-with-text3").append('<span class="vaild-check valid"></span>');
		
	});
	
	
	jQuery("#show-after-get input[name='packing_service']").click(function(){
		jQuery("#show-after-get .packing-service span").remove();
		jQuery("#show-after-get .packing-service").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("input[name='dismantle']").click(function(){
		jQuery(".dismantle span").remove();
		jQuery(".dismantle").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("input[name='storage']").click(function(){
		jQuery(".storage span").remove();
		jQuery(".storage").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("input[name='out_of_business']").click(function(){
		jQuery(".out_of_business span").remove();
		jQuery(".out_of_business").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("input[name='any_addition_information']").click(function(){
		jQuery(".step-4-checkbox span").remove();
		jQuery(".step-4-checkbox").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("select[name='country']").change(function(){
		if(jQuery(this).val() != ""){
			jQuery("span.country-select").remove();
			jQuery(this).after('<span class="vaild-check country-select valid"></span>');
		}else{
			jQuery("span.country-select").remove();
		}
		
	});
		
	jQuery("#show-after-get select[name='floor_from']").change(function(){
		if(jQuery(this).val() == "Ground"){ 
			jQuery("input[name='lift_available_from']").attr( 'checked', 'checked' );
			jQuery("#show-after-get .leftpart .redio-with-text2 span").remove();
			jQuery("#show-after-get .leftpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		}
		if(jQuery(this).val() != ""){
			jQuery("#show-after-get span.floor_from").remove();
			jQuery(this).after('<span class="vaild-check floor_from valid"></span>');
		}else{
			jQuery("#show-after-get span.floor_from").remove();
		}
	});
	jQuery("#show-after-get select[name='floor_to']").change(function(){
		if(jQuery(this).val() == "Ground"){ 
			jQuery("input[name='lift_available_to']").attr( 'checked', 'checked' );
			jQuery("#show-after-get .rightpart .redio-with-text2 span").remove();
			jQuery("#show-after-get .rightpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		}
		if(jQuery(this).val() != ""){
			jQuery("#show-after-get span.floor_to").remove();
			jQuery(this).after('<span class="vaild-check floor_to valid"></span>');
		}else{
			
			jQuery("#show-after-get span.floor_to").remove();
		}
	});

	//form-business validation rules
		jQuery("#form-business input[name='phone']").keypress(phoneValidation);
        jQuery("#form-business").validate({
                rules: {
					bedrooms: "required",
                    name: "required",
					phone: "required",
					postcode: "required",
					address: "required",
                    city: "required",
					city_to: "required",
					packing_service: "required",
					dismantle : "required",
					storage : "required",
					date: "required",
					
                    email: {
                        required: true,
                        email: true
                    },
					phone: {
                        required: true,
						
						phoneValidate: true,
                        
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    agree: "required"
                },
                messages: {
					bedrooms: "Size of current property is required",
                    name: "Your name is required",
                    phone: "Please enter a valid phone number",
					email: "Your email address is required",
                  	postcode: "Your post code address is required",
					address: "Your address is required",
                    city: "Your city is required",
					city_to: "Your city is required",
					packing_service: "Packing service is required",
                    dismantle: "Dismantle / Reassemble is required",
					storage: "Storage is required",
					date: "Anticipated moving date is required",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

    	
		jQuery(".get-my-quote-second-business").click(function() {
    		jQuery("#form-business").submit();
 		 });
		 
	 	jQuery('#form-business input').keydown(function(e) {
			if (e.keyCode == 13) {
    			jQuery("#form-business").submit();
			}
 		 });


		jQuery("#form-business input[name='property_type_from']").click(function(){
			if(jQuery(this).val() == "Apartment / Flat"){
				jQuery("#form-business #appartment-floor-from").css("display","block");
				jQuery("#form-business select[name='floor_from']").prop("required",true);
				jQuery("#form-business input[name='lift_available_from']").prop("required",true);
			}else{
				jQuery("#form-business #appartment-floor-from").css("display","none");
				jQuery("#form-business select[name='floor_from']").prop("required",false);
				jQuery("#form-business input[name='lift_available_from']").prop("required",false);
			}
			
			jQuery("#form-business .leftpart .redio-with-text h5 span").remove();
			jQuery("#form-business .leftpart .redio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
		
		});

		jQuery("#form-business input[name='property_type_to']").click(function(){
			if(jQuery(this).val() == "Apartment / Flat"){
				jQuery("#form-business #appartment-floor-to").css("display","block");
				jQuery("#form-business select[name='floor_to']").prop("required",true);
				jQuery("#form-business input[name='lift_available_to']").prop("required",true);
			}else{
				jQuery("#form-business #appartment-floor-to").css("display","none");
				jQuery("#form-business select[name='floor_to']").prop("required",false);
				jQuery("#form-business input[name='lift_available_to']").prop("required",false);
			}
			jQuery("#form-business .rightpart .redio-with-text h5 span").remove();
			jQuery("#form-business .rightpart .redio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
			
		});

		jQuery("#form-business select[name='floor_from']").change(function(){
			if(jQuery(this).val() == "Ground"){ 
				jQuery("input[name='lift_available_from']").attr( 'checked', 'checked' );
				jQuery("#form-business .leftpart .redio-with-text2 span").remove();
				jQuery("#form-business .leftpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
			}
			if(jQuery(this).val() != ""){
				jQuery("#form-business span.floor_from").remove();
				jQuery(this).after('<span class="vaild-check floor_from valid"></span>');
			}else{
				jQuery("#form-business span.floor_from").remove();
			}
		});
		
		jQuery("#form-business select[name='floor_to']").change(function(){
			if(jQuery(this).val() == "Ground"){ 
				jQuery("input[name='lift_available_to']").attr( 'checked', 'checked' );
				jQuery("#form-business .rightpart .redio-with-text2 span").remove();
				jQuery("#form-business .rightpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
			}
			if(jQuery(this).val() != ""){
				jQuery("#form-business span.floor_to").remove();
				jQuery(this).after('<span class="vaild-check floor_to valid"></span>');
			}else{
				
				jQuery("#form-business span.floor_to").remove();
			}
		});
		
		jQuery("#form-business input[name='lift_available_from']").click(function(){
			jQuery("#form-business .leftpart .redio-with-text2 span").remove();
			jQuery("#form-business .leftpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
		});
	
		jQuery("#form-business input[name='lift_available_to']").click(function(){
			jQuery("#form-business .rightpart .redio-with-text2 span").remove();
			jQuery("#form-business .rightpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
		});
	
		jQuery("#form-business input[name='parking_available_from']").click(function(){
			jQuery("#form-business .leftpart .redio-with-text3 span").remove();
			jQuery("#form-business .leftpart .redio-with-text3").append('<span class="vaild-check valid"></span>');
		
		});
	
		jQuery("#form-business input[name='parking_available_to']").click(function(){
			jQuery("#form-business .rightpart .redio-with-text3 span").remove();
			jQuery("#form-business .rightpart .redio-with-text3").append('<span class="vaild-check valid"></span>');
		
		});
	
	
		jQuery("#form-business input[name='packing_service']").click(function(){
			jQuery("#form-business .packing-service span").remove();
			jQuery("#form-business .packing-service").append('<span class="vaild-check valid"></span>');
		
		});

		jQuery("#form-international input[name='parking_available_from']").click(function(){
			
			if(jQuery(this).val() == "No"){
				jQuery("#form-international .parking-issues-from").css("display","block");
			}else{
				jQuery("#form-international .parking-issues-from").css("display","none");
			}
			
		});
		
	//form-international validation rules
		jQuery("#form-international input[name='phone']").keypress(phoneValidation);
        jQuery("#form-international").validate({
                rules: {
					bedrooms: "required",
                    name: "required",
					phone: "required",
					postcode: "required",
					address: "required",
                    city: "required",
					city_to: "required",
					packing_service: "required",
					dismantle : "required",
					storage : "required",
					date: "required",
					
                    email: {
                        required: true,
                        email: true
                    },
					phone: {
                        required: true,
                       
						phoneValidate: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    agree: "required"
                },
                messages: {
					bedrooms: "Size of current property is required",
                    name: "Your name is required",
                    phone: "Please enter a valid phone number",
					email: "Your email address is required",
                  	postcode: "Your post code address is required",
					address: "Your address is required",
                    city: "Your city is required",
					city_to: "Your city is required",
					packing_service: "Packing service is required",
                    dismantle: "Dismantle / Reassemble is required",
					storage: "Storage is required",
					date: "Anticipated moving date is required",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

    	
		jQuery(".get-my-quote-second-international").click(function() {
    		jQuery("#form-international").submit();
 		 });
		 
	 	jQuery('#form-international input').keydown(function(e) {
			if (e.keyCode == 13) {
    			jQuery("#form-international").submit();
			}
 		 });
		
		jQuery("#form-international input[name='property_type_from']").click(function(){
			if(jQuery(this).val() == "Apartment / Flat"){
				jQuery("#form-international #appartment-floor-from").css("display","block");
				jQuery("#form-international select[name='floor_from']").prop("required",true);
				jQuery("#form-international input[name='lift_available_from']").prop("required",true);
			}else{
				jQuery("#form-international #appartment-floor-from").css("display","none");
				jQuery("#form-international select[name='floor_from']").prop("required",false);
				jQuery("#form-international input[name='lift_available_from']").prop("required",false);
			}
			
			jQuery("#form-international .leftpart .redio-with-text h5 span").remove();
			jQuery("#form-international .leftpart .redio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
		
		});

		jQuery("#form-international input[name='property_type_to']").click(function(){
			if(jQuery(this).val() == "Apartment / Flat"){
				jQuery("#form-international #appartment-floor-to").css("display","block");
				jQuery("#form-international select[name='floor_to']").prop("required",true);
				jQuery("#form-international input[name='lift_available_to']").prop("required",true);
			}else{
				jQuery("#form-international #appartment-floor-to").css("display","none");
				jQuery("#form-international select[name='floor_to']").prop("required",false);
				jQuery("#form-international input[name='lift_available_to']").prop("required",false);
			}
			jQuery("#form-international .rightpart .redio-with-text h5 span").remove();
			jQuery("#form-international .rightpart .redio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
			
		});
		
		jQuery("#form-international select[name='floor_from']").change(function(){
			if(jQuery(this).val() == "Ground"){ 
				jQuery("#form-international .leftpart .redio-with-text2 span").remove();
				jQuery("#form-international .leftpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
				jQuery("input[name='lift_available_from']").attr( 'checked', 'checked' );
			}
			if(jQuery(this).val() != ""){
				jQuery("#form-international span.floor_from").remove();
				jQuery(this).after('<span class="vaild-check floor_from valid"></span>');
			}else{
				jQuery("#form-international span.floor_from").remove();
			}
		});
	
	jQuery("#form-international select[name='floor_to']").change(function(){
		if(jQuery(this).val() == "Ground"){ 
			
			jQuery("#form-international .rightpart .redio-with-text2 span").remove();
			jQuery("#form-international .rightpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
			jQuery("input[name='lift_available_to']").attr( 'checked', 'checked' );
		}
		if(jQuery(this).val() != ""){
			jQuery("#form-international span.floor_to").remove();
			jQuery(this).after('<span class="vaild-check floor_to valid"></span>');
		}else{
			
			jQuery("#form-international span.floor_to").remove();
		}
	});
	
		jQuery("#form-international input[name='lift_available_from']").click(function(){
		jQuery("#form-international .leftpart .redio-with-text2 span").remove();
		jQuery("#form-international .leftpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
	});
	
	jQuery("#form-international input[name='lift_available_to']").click(function(){
		jQuery("#form-international .rightpart .redio-with-text2 span").remove();
		jQuery("#form-international .rightpart .redio-with-text2").append('<span class="vaild-check valid"></span>');
		
	});
	
	
	jQuery("#form-international input[name='packing_service']").click(function(){
		jQuery("#form-international .packing-service span").remove();
		jQuery("#form-international .packing-service").append('<span class="vaild-check valid"></span>');
		
	});

	jQuery("#form-international select[name='countryTo']").change(function(){
		if(jQuery(this).val() != ""){
			jQuery("#form-international .select-item").addClass('valid');
		}else{
			jQuery("#form-international .select-item").removeClass('valid');
		}
	});
	
	jQuery("input[name='shipping_method']").click(function(){
			jQuery(".shipping-method span").remove();
			jQuery(".shipping-method").append('<span class="vaild-check valid" style="margin-left: 7px;"></span>');
		
	});
	
});