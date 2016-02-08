// JavaScript Document
jQuery( document ).ready(function() {
		
	//Custom Validations
	
	//Validate Phone Number
	jQuery.validator.addMethod("phoneValidate", function (phone_number, element) {
       	
		e = phone_number;
		p = e.substring(0, 1);
		r = e.substring(0, 4);
        t = e.substring(0, 2);
    	q = e.substring(0, 3);
    	
    	i = ["01", "02", "03", "05", "07", "08", "44", "+1","+2","+3","+5","+7","+8","+44"];
        
        if(i.indexOf(t) == -1 && i.indexOf(q) == -1) return false;
        if((t == "07") && !e.match(/^07[0-9]{9}$/)) return false;
        if(r == "+447" && !e.match(/^\+447[0-9]{9}$/)) return false;
        if(p == "+" && e.length <= 8) return false;
        if((p != "+") && (e.length <= 8 || e.length > 13)) return false;
        if(e.match(/1{5}|2{5}|3{5}|4{5}|5{5}|6{5}|7{5}|8{5}|9{5}|0{5}/)) return false;
        if(e.match(/01234|12345|23456|34567|45678|56789|98765|87654|76543|65432|54321|43210$/g)) return false;
        
        return true;
		
		
    }, "Invalid phone number");
		
	//Validate Date
	jQuery.validator.addMethod("dateValidate", function(value, element, params){
				
		var matches = value.match(/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/);
		
		if(matches==null )
		{
			return false
		}
		
		
		if(matches.length<3)
		{
			return false;
		}
		
		var day = parseInt(matches[1]);
		var month = parseInt(matches[2]);
		var year = parseInt(matches[3]);
		
		var dt = new Date();
		
		//check month
		if(!(month>=1 && month <= 12))
		{
			
			return false;
		}
		
		if(!(day>=1 && day <= 31))
		{
			
			return false;
		}
		
		if(year < dt.getFullYear())
		{
			
			return false;
		}
		
		
		//leap year check
		var lyear = false;  
		if ( (!(year % 4) && year % 100) || !(year % 400))   
		{  
		  lyear = true;  
		}
		
		if(lyear == false && month == 2 && day > 28)
		{
			return false;
		}
		
		if(month == 2 && day > 29)
		{
			return false;
		}
		
		
		var month_days_30 = [4,6,9,11];		
		if(jQuery.inArray(month, month_days_30) > -1 && day > 30)
		{
			
			return false;
		}
		
		var chkDt = new Date(year, month-1 , day, 0, 0, 0, 0);
		if(chkDt.getTime() < dt.getTime())
		{
			return false;
		}
		
					
		return true;
		
	}, "Invalid moving date. Date must be in mm/dd/yyyy format and must be future date.");
	
	
	//Allow Only Characters
	jQuery.validator.addMethod("onlyChars", function(value, element, params){
		var matches = value.match(/\d+/g);
		if(matches!=null && matches.length>0)
		{
			return false;
		}
		return true;
	}, "Invalid name. Name must be atleast 2 chars long and can not contain digits.");
	
	
	//If Additional Info radio is clicked then validate it
	jQuery.validator.addMethod("additional_info_valid", function(value, element, params){
		
		
		var frm = jQuery(element).closest('form');
		
		if(jQuery(frm).find("input[name='any_addition_information']:checked").val() == "Yes")
		{
			if(value == '')
			{
				return false;
			}
		}			
		return true;
		
	}, "Additional information is required");
	
	
	
	//If information provided then make it valid
	jQuery("input[name='any_addition_information']").click(function(){
		
		var frm = jQuery(this).closest("form"); 
		jQuery(frm).find("textarea[name='additional_info']").valid();
		
	});
	
	
        //form validation rules
        jQuery("#form").validate({
        	
        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {
					 
				      var first_element = validator.errorList[0].element;
					  var real_offset = $(first_element).offset();
					  var top_offset  = real_offset.top - 100;
					  var left_offset = real_offset.left;
					  
					  jQuery(window).scrollTo({top:top_offset,left:left_offset});
					 
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
		
			jQuery("div.danger").show();
			jQuery("div.danger span").html("You have missed "
			+ errors + 
			((errors>1)?" fields":" field")+". Please correct and re-submit.");
			this.defaultShowErrors();
		  }
		  else{
			  jQuery("div.danger").hide();
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
					
						jQuery("div.danger").show();
						jQuery("div.danger span").html("You have missed "
						+ errors + 
						((errors>1)?" fields":" field")+". Please correct and re-submit.");
						this.defaultShowErrors();
					  }
					  else{
						  jQuery("div.danger").hide();
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
		
        jQuery("#form-international").validate({
        	
        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {
					 
				      var first_element = validator.errorList[0].element;
					  var real_offset = $(first_element).offset();
					  var top_offset  = real_offset.top - 100;
					  var left_offset = real_offset.left;
					  
					  jQuery(window).scrollTo({top:top_offset,left:left_offset});
					 
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
					
						jQuery("div.danger").show();
						jQuery("div.danger span").html("You have missed "
						+ errors + 
						((errors>1)?" fields":" field")+". Please correct and re-submit.");
						this.defaultShowErrors();
					  }
					  else{
						jQuery("div.danger").hide();
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
	
	//Date Picker for all forms (Residential,Commercial and international)
	
	jQuery('#date1').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
		}
	});
	 
	jQuery('#date2').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
		}
	});
	
	jQuery('#date3').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
		}
	});
	
	//Date Picker for all forms (Residential,Commercial and international)
	
});