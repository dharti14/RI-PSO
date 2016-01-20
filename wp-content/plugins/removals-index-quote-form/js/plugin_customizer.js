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
		
	//Validate Date
	jQuery.validator.addMethod("dateValidate",function(a){
		
		var b=a.match(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/);
		if(null==b)return!1;
		if(b.length<3)return!1;
		var c=parseInt(b[1]),d=parseInt(b[2]),e=parseInt(b[3]),f=new Date;
		if(!(d>=1&&12>=d))return!1;
		if(!(c>=1&&31>=c))return!1;
		if(e<f.getFullYear())return!1;
		var g=!1;if((e%4||!(e%100))&&e%400||(g=!0),0==g&&2==d&&c>28)return!1;
		if(2==d&&c>29)return!1;
		var h=[4,6,9,11];
		if(jQuery.inArray(d,h)>-1&&c>30)return!1;
		var i=new Date(e,d-1,c,0,0,0,0);
		return i.getTime()<f.getTime()?!1:!0
				
	},"Invalid moving date. Date must be in mm/dd/yyyy format and must be future date."),
	
	
	//Allow Only Characters
	jQuery.validator.addMethod("onlyChars",function(a){
		var b=a.match(/\d+/g);
		return null!=b&&b.length>0?!1:!0
	},"Invalid name. Name must be atleast 2 chars long and can not contain digits."),
	
	//If Additional Info radio is clicked then validate it
	jQuery.validator.addMethod("additional_info_valid",function(a,b){
				
		var c=jQuery(b).closest("form");
		return"Yes"==jQuery(c).find("input[name='any_addition_information']:checked").val()&&""==a?!1:!0
	},"Additional information is required"),
	
	//If information provided then make it valid
	jQuery("input[name='any_addition_information']").click(function(){
		var a=jQuery(this).closest("form");jQuery(a).find("textarea[name='additional_info']").valid();
	}),
	
	
        //form validation rules
		jQuery("#form input[name='phone']").keypress(phoneValidation);
        jQuery("#form").validate({
        	
        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {
					 
				      var first_element = validator.errorList[0].element;
					  var real_offset = $(first_element).offset();
					  var top_offset  = real_offset.top - 100;
					  var left_offset = real_offset.left;
					  
					  $(window).scrollTo({top:top_offset,left:left_offset});
					 
					}

				},
        	
       rules:{
        	bedrooms:"required",
			fullname:{
				required:true,
				minlength:2,
				onlyChars:true
			},
			phone:"required",
			postcode:"required",
			address:"required",
			city:"required",
			city_to:"required",
			property_type_from:"required",
			property_type_to:"required",
			packing_service:"required",
			dismantle:"required",
			storage:"required",
			date:{
				required:true,
				dateValidate:true
			},
			email:{
				required:true,
				email:true
			},
			phone:{
				required:true,
				phoneValidate:true
			},
			password:{
				required:true,
				minlength:5
			},
			agree:"required",
			additional_info:"additional_info_valid"
	
		},
		
		errorPlacement: function (error, element) {                   
            if (element.attr("name") == "property_type_from") {
               error.appendTo("div.leftpart div.redio-with-text");
            }
			else if(element.attr("name") == "property_type_to")
			{
				error.appendTo("div.rightpart div.redio-with-text");
			}					
			else {
                error.insertAfter(element);
            }						
			
        },
		showErrors: function(errorMap, errorList) {
		var errors = this.numberOfInvalids();
		if(errors > 0){
		
			$("div.danger").show();
			$("div.danger span").html("You missed "
			+ errors
			+ " field. It has been highlighted");
			this.defaultShowErrors();
		  }
		  else{
			$("div.danger").hide();
			this.defaultShowErrors();
		  }				  
		},
		
		messages:{
			bedrooms:"Size of current property is required",
			fullname:{
				required:"Your name is required",
				minlength:"Your name should be atleast 2 characters long"
			},
		    phone:"Please enter a valid phone number",
		    email:"Your email address is required",
		    postcode:"Your post code address is required",
		    address:"Your address is required",
		    city:"Your city is required",
		    city_to:"Your city is required",
		    property_type_from:"Property type is required",
		    property_type_to:"Property type is required",
		    packing_service:"Packing service is required",
		    dismantle:"Dismantle / Reassemble is required",
		    storage:"Storage is required",
		    date:{
		    	required:"Anticipated moving date is required",
		    	dateValidate:"Invalid moving date. Date must be in dd/mm/yyyy format and must be a future date."
		    }
		},
		
        submitHandler: function(form) {
                form.submit();
        }
     });

    	
		jQuery(".get-my-quote-second").click(function() {
    		jQuery("#form").submit();
    		
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
			jQuery('#greenwood_drive').show();
			
			if(jQuery('div#show-after-get-international').is(":visible") == true){
				jQuery('#greenwood_drive2').show();
			}
			
			jQuery("input[name='any_addition_information']").attr( 'checked', 'checked' );
			jQuery('textarea[name="additional_info"]').valid();
			
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
        	
        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {
					 
				      var first_element = validator.errorList[0].element;
					  var real_offset = $(first_element).offset();
					  var top_offset  = real_offset.top - 100;
					  var left_offset = real_offset.left;
					  
					  $(window).scrollTo({top:top_offset,left:left_offset});
					 
					}	
				},	
			rules:{
				bedrooms:"required",
				fullname:{
					required:true,
					minlength:2,
					onlyChars:true
				},
				postcode:"required",
				address:"required",
				city:"required",
				city_to:"required",
				packing_service:"required",
				dismantle:"required",
				storage:"required",
				date:{
			    	required:true,
			    	dateValidate:true
			    },
				email:{
					required:true,
					email:true
				},
				phone:{
					required:true,
					phoneValidate:true
				},
				password:{
					required:true,
					minlength:5
				},
				agree:"required",
				additional_info:"additional_info_valid"
				},
				
				showErrors: function(errorMap, errorList) {
					var errors = this.numberOfInvalids();
					if(errors > 0){
					
						$("div.danger").show();
						$("div.danger span").html("You missed "
						+ errors
						+ " field. It has been highlighted");
						this.defaultShowErrors();
					  }
					  else{
						$("div.danger").hide();
						this.defaultShowErrors();
					  }				  
					},
				
				messages:{
					bedrooms:"Size of current property is required",
					fullname:{
						required:"Your name is required",
						minlength:"Your name should be atleast 2 characters long"
					},
					phone:"Please enter a valid phone number",
					email:"Your email address is required",
					postcode:"Your post code address is required",
					address:"Your address is required",
					city:"Your city is required",
					city_to:"Your city is required",
					packing_service:"Packing service is required",
					dismantle:"Dismantle / Reassemble is required",
					storage:"Storage is required",
					date:{
				    	required:"Anticipated moving date is required",
				    	dateValidate:"Invalid moving date. Date must be in dd/mm/yyyy format and must be a future date."
				    }
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
        	
        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {
					 
				      var first_element = validator.errorList[0].element;
					  var real_offset = $(first_element).offset();
					  var top_offset  = real_offset.top - 100;
					  var left_offset = real_offset.left;
					  
					  $(window).scrollTo({top:top_offset,left:left_offset});
					 
					}
				},
        	rules:{
        		bedrooms:"required",
        		fullname:{
        			required:true,
        			minlength:2,
        			onlyChars:true
        		},
        		postcode:"required",
        		address:"required",
        		city:"required",
        		city_to:"required",
        		property_type_from:"required",
        		property_type_to:"required",
        		packing_service:"required",
        		dismantle:"required",
        		storage:"required",
        		shipping_method:"required",
        		date:{
    		    	required:true,
    		    	dateValidate:true
    		    },
        		email:{
        			required:true,
        			email:true
        		},
        		phone:{
        			required:true,
        			phoneValidate:true
        		},
        		password:{
        			required:true,
        			minlength:5
        		},
        		agree:"required",
        		additional_info:"additional_info_valid"
        		},
        		
        		errorPlacement: function (error, element) {  
        			
                    if (element.attr("name") == "property_type_from") {
                       error.appendTo("div.leftpart div.redio-with-text");
                    }
					else if(element.attr("name") == "property_type_to")
					{
						error.appendTo("div.rightpart div.redio-with-text");
					}					
					else {
                        error.insertAfter(element);
                    }						
					
                },
				showErrors: function(errorMap, errorList) {
					var errors = this.numberOfInvalids();
					if(errors > 0){
					
						$("div.danger").show();
						$("div.danger span").html("You missed "
						+ errors
						+ " field. It has been highlighted");
						this.defaultShowErrors();
					  }
					  else{
						$("div.danger").hide();
						this.defaultShowErrors();
					  }				  
				},
        		
        		messages:{
        			bedrooms:"Size of current property is required",
        			fullname:{
        				required:"Your name is required",
        				minlength:"Your name should be atleast 2 characters long"
        			},
        			phone:"Please enter a valid phone number",
        			email:"Your email address is required",
        			postcode:"Your post code address is required",
        			address:"Your address is required",
        			city:"Your city is required",
        			city_to:"Your city is required",
        			property_type_from:"Property type is required",
        			property_type_to:"Property type is required",
        			packing_service:"Packing service is required",
        			dismantle:"Dismantle / Reassemble is required",
        			storage:"Storage is required",
        			shipping_method:"Shipping Method is required",
        			date:{
    			    	required:"Anticipated moving date is required",
    			    	dateValidate:"Invalid moving date. Date must be in dd/mm/yyyy format and must be a future date."
    			    }			
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