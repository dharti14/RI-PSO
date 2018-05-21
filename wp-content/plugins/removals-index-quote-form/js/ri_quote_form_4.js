// JavaScript Document
jQuery( document ).ready(function() {

	//Custom Validations

	//Postcode Validation
	
	jQuery.validator.addMethod("postcodeValidate", function (post_code, element) {
		
		
		e = post_code;		
		var postcodePrefix = ['ab', 'al', 'b', 'ba', 'bb', 'bd', 'bh', 'bl', 'bn', 'br', 'bs', 'bt', 'ca', 'cb', 'cf', 'ch', 'cm', 'co', 'cr', 'ct', 'cv', 'cw', 'da', 'dd', 'de', 'dg', 'dh', 'dl', 'dn', 'dt', 'dy', 'e', 'ec', 'eh', 'en', 'ex', 'fk', 'fy', 'g', 'gl', 'gu', 'gy', 'ha', 'hd', 'hg', 'hp', 'hr', 'hs', 'hu', 'hx', 'ig', 'im', 'ip', 'iv', 'je', 'ka', 'kt', 'kw', 'ky', 'l', 'la', 'ld', 'le', 'll', 'ln', 'ls', 'lu', 'm', 'me', 'mk', 'ml', 'n', 'ne', 'ng', 'nn', 'np', 'nr', 'nw', 'ol', 'ox', 'pa', 'pe', 'ph', 'pl', 'po', 'pr', 'rg', 'rh', 'rm', 's', 'sa', 'se', 'sg', 'sk', 'sl', 'sm', 'sn', 'so', 'sp', 'sr', 'ss', 'st', 'sw', 'sy', 'ta', 'td', 'te', 'tf', 'tn', 'tq', 'tr', 'ts', 'tw', 'ub', 'w', 'wa', 'wc', 'wd', 'wf', 'wn', 'wr', 'ws', 'wv', 'yo', 'ze'];
		var postcode = e.replace(/\s+/, '');
		var prefix = '';
		var format = 'invalid';
		if (postcode.length > 7) return !1;
		
		if (postcode.length > 4)
		{
			var patterns = ['((^[a-zA-Z]{2})[\\d]{1}[a-zA-Z]{1})[\\d]{1}[a-zA-Z]{2}', 
			                '((^[a-zA-Z]{2})[\\d]{2})[\\d]{1}[a-zA-Z]{2}', 
			                '((^[a-zA-Z]{2})[\\d]{1})[\\d]{1}[a-zA-Z]{2}', 
			                '((^[a-zA-Z]{1})[\\d]{1}[a-zA-Z]{1})[\\d]{1}[a-zA-Z]{2}', 
			                '((^[a-zA-Z]{1})[\\d]{1})[\\d]{1}[a-zA-Z]{2}', 
			                '((^[a-zA-Z]{1})[\\d]{2})[\\d]{1}[a-zA-Z]{2}'];
			for (var i = 0; i < patterns.length; i++)
			{
				if (match = postcode.match(new RegExp(patterns[i])))
				{
					if (match.length > 2)
						prefix = match[2];
					break;
				}
			}
		}
		else
		{
			if (match = postcode.match(/^([a-zA-Z]{1})[\d]{1,2}/))
			{
				if (match.length > 1)
					prefix = match[1];
			}
			else if (match = postcode.match(/^([a-zA-Z]{2})[\d]{1,2}/))
			{
				if (match.length > 1)
					prefix = match[1];
			}
		}
		
		if (prefix != '')
		{
			for (var j = 0; j < postcodePrefix.length; j++)
			{
				if (prefix.toLowerCase() == postcodePrefix[j])
				{
					format = 'valid';
					break;
				}
			}
		}
		if (format == 'invalid') return !1;
		return !0;
		
	},"Please enter a valid postcode");
	
	
	//Validate City
	jQuery.validator.addMethod("cityValidate", function (tocity, element) {

		if(jQuery(active_business_type_class+' #cityto').val() == "")
		{	
			return false;
		}
		else
		{
			return true;
		}	


    }, "Please select a value form dropdown");

	
	
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
	}, "Invalid name. Name must be at least 2 characters long and can not contain digits.");


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

	//When the get quotes button will be clicked, we will set the respective form and its selector
	jQuery('.btn-quote').on('click',function(){

		if(typeof ri_validate_email_lookup === "function" && typeof ri_validate_phone_lookup === "function"){

			var email_selector = '';
			var phone_selector = '';

			if(jQuery('#show-after-get').is(':visible')){ //Domestic Form

				email_selector = '#form input[name="email"]';
				phone_selector = '#form input[name="phone"]';

			}else if(jQuery('#show-after-get-business').is(':visible')){ // Commercial Form

				email_selector = '#form-business input[name="email"]';
				phone_selector = '#form-business input[name="phone"]';

			}else if(jQuery('#show-after-get-international').is(':visible')){ //International Form

				email_selector = '#form-international input[name="email"]';
				phone_selector = '#form-international input[name="phone"]';

			}

			ri_validate_email_lookup(email_selector);
			ri_validate_phone_lookup(phone_selector);


		}
	});


        //form validation rules
       var dm_form =  jQuery("#form").validate({

        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {

				      var first_element = validator.errorList[0].element;
					  var real_offset = jQuery(first_element).offset();
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
			postcode:{
				required:true,
				postcodeValidate:true				
			},
			postcode_to:{
				required: function(element) {
		            return jQuery("#nearesttown").is(':empty');
		        },
		        postcodeValidate:true,
		        cityValidate:true
		    },
			nearesttown:{
				required: function(element) {
		            return jQuery("#postcodeto").is(':empty');
		        },
		        cityValidate:true
			},
			address:"required",
			city:"required",			
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
				required:true
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
               error.appendTo("div.moving-from-wrapper div.radio-with-text");
            }
			else if(element.attr("name") == "property_type_to")
			{
				error.appendTo("div.moving-to-wrapper div.radio-with-text");
			}
			else if(element.attr("name") == "bedrooms")
			{
				error.appendTo("div.step1 div.removing-stress-form-con");
			}	
			else 
			{
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
				minlength:"Your name should be at least 2 characters long"
			},
		    phone:"Please enter a valid phone number",
		    email:"Your email address is required",
		    postcode:{
		    	required:"Please select moving from postcode",
		    	
		    },
		    postcode_to:{
		    	required:"Please select moving to postcode",
		    	cityValidate:"Please select a valid postcode"
		    },
		    nearesttown:{
		    	required:"Please select nearest town",
		        cityValidate:"Please select a valid town"
		    },
		    address:"Your address is required",
		    city:"Your city is required",		   
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
								//jQuery("#get-my-quote-top").css('disabled','disabled');

				jQuery(form).find("button[type='submit']").attr( 'disabled' , true);

                form.submit();
        }
     });

		

     //checking for the checkbox checked and apply valid class to it.
	 	jQuery('#show-after-get .bedroom-radios-container').click(function(){	 		
	 		
	 		jQuery("#show-after-get .bedroom-radios-container").each(function(){
	 			jQuery(this).children().eq(0).removeClass("bedroom-radios-container-sel");
	 		});	 		

			if(jQuery(this).attr("rel") == "bed0"){
				// need to update as per new design
				jQuery(".step-4-checkbox span").remove();
				jQuery(".step-4-checkbox").append('<span class="vaild-check valid"></span>');
				jQuery('#greenwood_drive').show();
				

				jQuery("input[name='any_addition_information']").attr('checked', 'checked');
				jQuery('textarea[name="additional_info"]').valid();

			}else{
				jQuery(this).children().eq(0).addClass("bedroom-radios-container-sel");
			}

			jQuery(this).find("input[type='radio']").prop("checked", true);
			
			jQuery(".removing-stress-form h4.property span").remove();
			jQuery(".removing-stress-form h4.property").append('<span class="vaild-check valid"></span>');
			
			if(jQuery("#show-after-get .step2").css("display") == "none")
			{	
				jQuery("#show-after-get .step1 .bottom-arrow").css({'display':'block'});
				jQuery("#show-after-get .step2").css({'display':'block'});
					
				jQuery('html, body').animate({
	        		scrollTop: jQuery('#show-after-get .step2').offset().top
	    		}, 800);
				isvalidAddress = false;
				
				if (jQuery("#show-after-get input[name='postcode']").val() != '' && jQuery("#show-after-get input[name='city']").val() != '' && jQuery("#show-after-get input[name='address']").val() != ''){
					
					isvalidAddress = true;
				}
					
					
				if(isvalidAddress){
					
					jQuery("#show-after-get input[name='houseno']").focus();
				}
				else
				{
					jQuery("#show-after-get input[name='postcode']").focus();
				}
			}
			
		});
       
	 	//Checking for the checkbox checked and apply valid class to it.
	 	jQuery('#show-after-get-international .bed-radios-container').click(function(){
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
	 	
	 	
	 	
	 	
	 	//Checking for the checkbox checked and apply valid class to it.


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

			jQuery("#show-after-get .moving-from-wrapper .radio-with-text h5 span").remove();
			jQuery("#show-after-get .moving-from-wrapper .radio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
			jQuery("#show-after-get #property_type_from-error").hide();

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
			jQuery("#show-after-get .moving-to-wrapper .radio-with-text h5 span").remove();
			jQuery("#show-after-get .moving-to-wrapper .radio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
			jQuery("#show-after-get #property_type_to-error").hide();

		});

		jQuery("#show-after-get input[name='lift_available_from']").click(function(){
			jQuery("#show-after-get .moving-from-wrapper .radio-with-text2 span").remove();
			jQuery("#show-after-get .moving-from-wrapper .radio-with-text2").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#show-after-get input[name='lift_available_to']").click(function(){
			jQuery("#show-after-get .moving-to-wrapper .radio-with-text2 span").remove();
			jQuery("#show-after-get .moving-to-wrapper .radio-with-text2").append('<span class="vaild-check valid"></span>');

		});

		/*jQuery("#show-after-get input[name='parking_available_from']").click(function(){
			jQuery("#show-after-get .leftpart .radio-with-text3 span").remove();
			jQuery("#show-after-get .leftpart .radio-with-text3").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#show-after-get input[name='parking_available_to']").click(function(){
			jQuery("#show-after-get .rightpart .radio-with-text3 span").remove();
			jQuery("#show-after-get .rightpart .radio-with-text3").append('<span class="vaild-check valid"></span>');

		});
*/

		jQuery("#show-after-get input[name='packing_service']").click(function(){
			jQuery("#show-after-get .packing-service .input-label-wrapper span").remove();
			jQuery("#show-after-get .packing-service .input-label-wrapper").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#show-after-get input[name='dismantle']").click(function(){
			jQuery(".dismantle .input-label-wrapper span").remove();
			jQuery(".dismantle .input-label-wrapper").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#show-after-get input[name='storage']").click(function(){
			jQuery(".storage .input-label-wrapper span").remove();
			jQuery(".storage .input-label-wrapper").append('<span class="vaild-check valid"></span>');

		});
		
		jQuery("input[name='dismantle']:not(#show-after-get input[name='dismantle'])").click(function(){
			jQuery(".dismantle span").remove();
			jQuery(".dismantle").append('<span class="vaild-check valid"></span>');

		});

		jQuery("input[name='storage']:not(#show-after-get input[name='storage'])").click(function(){
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
			if(jQuery(this).val() != ""){
				
				if(jQuery(this).val() == "Ground"){
					
					jQuery("input[name='lift_available_from']").attr( 'checked', 'checked' );
					jQuery("#show-after-get .moving-from-wrapper .radio-with-text2 span").remove();
					jQuery("#show-after-get .moving-from-wrapper .radio-with-text2").append('<span class="vaild-check valid"></span>');
				}
				else
				{			
					jQuery("#show-after-get span.floor_from").remove();
					jQuery(this).after('<span class="vaild-check floor_from valid"></span>');
				}
			}else{
					jQuery("#show-after-get span.floor_from").remove();
			}
		});
		jQuery("#show-after-get select[name='floor_to']").change(function(){
			if(jQuery(this).val() != ""){
				if(jQuery(this).val() == "Ground"){
					jQuery("input[name='lift_available_to']").attr( 'checked', 'checked' );
					jQuery("#show-after-get .moving-to-wrapper .radio-with-text2 span").remove();
					jQuery("#show-after-get .moving-to-wrapper .radio-with-text2").append('<span class="vaild-check valid"></span>');
				}
				else
				{
					jQuery("#show-after-get span.floor_to").remove();
					jQuery(this).after('<span class="vaild-check floor_to valid"></span>');
				}		
				
			}else{

				jQuery("#show-after-get span.floor_to").remove();
			}
		});

		//form-business validation rules

       var cm_form = jQuery("#form-business").validate({

        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {

				      var first_element = validator.errorList[0].element;
					  var real_offset = jQuery(first_element).offset();
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
				postcode:{
					required:true,
					postcodeValidate:true				
				},
				postcode_to:{
					required: function(element) {
			            return jQuery("#nearesttowncom").is(':empty');
			        },
			        postcodeValidate:true,
			        
			    },
			    nearesttowncom:{
					required: function(element) {
			            return jQuery("#form-business #postcodeto").is(':empty');
			        }			       
				},
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
						minlength:"Your name should be at least 2 characters long"
					},
					phone:"Please enter a valid phone number",
					email:"Your email address is required",					
					postcode:{
						required:"Your post code address is required",
						postcodeValidate:"Please enter a valid postcode"				
					},
					 postcode_to:{
					    	required:"Please select moving to postcode"
				    },
				    nearesttowncom:{
				    	required:"Please select nearest town",
				       
				    },
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
					jQuery(form).find("button[type='submit']").attr( 'disabled' , true);
		            form.submit();
		        }
	});


		/*jQuery(".get-my-quote-second-business").click(function() {
    		jQuery("#form-business").submit();
 		 });

	 	jQuery('#form-business input').keydown(function(e) {
			if (e.keyCode == 13) {
    			jQuery("#form-business").submit();
			}
 		 });*/


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

			jQuery("#form-business .leftpart .radio-with-text h5 span").remove();
			jQuery("#form-business .leftpart .radio-with-text h5").append('<span class="vaild-check property_type valid"></span>');

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
			jQuery("#form-business .rightpart .radio-with-text h5 span").remove();
			jQuery("#form-business .rightpart .radio-with-text h5").append('<span class="vaild-check property_type valid"></span>');

		});

		jQuery("#form-business select[name='floor_from']").change(function(){
			if(jQuery(this).val() == "Ground"){
				jQuery("input[name='lift_available_from']").attr( 'checked', 'checked' );
				jQuery("#form-business .leftpart .radio-with-text2 span").remove();
				jQuery("#form-business .leftpart .radio-with-text2").append('<span class="vaild-check valid"></span>');
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
				jQuery("#form-business .rightpart .radio-with-text2 span").remove();
				jQuery("#form-business .rightpart .radio-with-text2").append('<span class="vaild-check valid"></span>');
			}
			if(jQuery(this).val() != ""){
				jQuery("#form-business span.floor_to").remove();
				jQuery(this).after('<span class="vaild-check floor_to valid"></span>');
			}else{

				jQuery("#form-business span.floor_to").remove();
			}
		});

		jQuery("#form-business input[name='lift_available_from']").click(function(){
			jQuery("#form-business .leftpart .radio-with-text2 span").remove();
			jQuery("#form-business .leftpart .radio-with-text2").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#form-business input[name='lift_available_to']").click(function(){
			jQuery("#form-business .rightpart .radio-with-text2 span").remove();
			jQuery("#form-business .rightpart .radio-with-text2").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#form-business input[name='parking_available_from']").click(function(){
			jQuery("#form-business .leftpart .radio-with-text3 span").remove();
			jQuery("#form-business .leftpart .radio-with-text3").append('<span class="vaild-check valid"></span>');

		});

		jQuery("#form-business input[name='parking_available_to']").click(function(){
			jQuery("#form-business .rightpart .radio-with-text3 span").remove();
			jQuery("#form-business .rightpart .radio-with-text3").append('<span class="vaild-check valid"></span>');

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

        var in_form = jQuery("#form-international").validate({

        	invalidHandler: function(event, validator) {
				 var errors = validator.numberOfInvalids();
					if (errors) {

				      var first_element = validator.errorList[0].element;
					  var real_offset = jQuery(first_element).offset();
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
        		postcode:{
					required:true,
					postcodeValidate:true				
				},
        		address:"required",
        		city:"required",
        		city_to:"required",
				countryTo:"required",
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
                       error.appendTo("div.leftpart div.radio-with-text");
                    }
					else if(element.attr("name") == "property_type_to")
					{
						error.appendTo("div.rightpart div.radio-with-text");
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
        				minlength:"Your name should be at least 2 characters long"
        			},
        			phone:"Please enter a valid phone number",
        			email:"Your email address is required",        			
        			postcode:{
    					required:"Your post code address is required",
    					postcodeValidate:"Please enter a valid postcode"				
    				},
        			address:"Your address is required",
        			city:"Your city is required",
        			city_to:"Your city is required",
					countryTo:"Your country is required",
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
					jQuery(form).find("button[type='submit']").attr( 'disabled' , true);
                    form.submit();
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

			jQuery("#form-international .leftpart .radio-with-text h5 span").remove();
			jQuery("#form-international .leftpart .radio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
			jQuery("#form-international #property_type_from-error").hide();

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
			jQuery("#form-international .rightpart .radio-with-text h5 span").remove();
			jQuery("#form-international .rightpart .radio-with-text h5").append('<span class="vaild-check property_type valid"></span>');
			jQuery("#form-international #property_type_to-error").hide();

		});

		jQuery("#form-international select[name='floor_from']").change(function(){
			if(jQuery(this).val() == "Ground"){
				jQuery("#form-international .leftpart .radio-with-text2 span").remove();
				jQuery("#form-international .leftpart .radio-with-text2").append('<span class="vaild-check valid"></span>');
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

			jQuery("#form-international .rightpart .radio-with-text2 span").remove();
			jQuery("#form-international .rightpart .radio-with-text2").append('<span class="vaild-check valid"></span>');

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
		jQuery("#form-international .leftpart .radio-with-text2 span").remove();
		jQuery("#form-international .leftpart .radio-with-text2").append('<span class="vaild-check valid"></span>');

	});

	jQuery("#form-international input[name='lift_available_to']").click(function(){
		jQuery("#form-international .rightpart .radio-with-text2 span").remove();
		jQuery("#form-international .rightpart .radio-with-text2").append('<span class="vaild-check valid"></span>');

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
		orientation:'bottom',		
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
			if(jQuery("#show-after-get .step3").css('display') == "none")
			{		
				jQuery("#show-after-get .step2 .bottom-arrow").css({'display':'block'});
				jQuery("#show-after-get .step3").css({'display':'block'});
				jQuery("#show-after-get .step4").css({'display':'block'});
				jQuery("#show-after-get .domestic-submit-btn").css({'display':'block'});
				jQuery('html, body').animate({
	        		scrollTop: jQuery('#show-after-get .step3').offset().top
	    		}, 800);
				
			}	

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

	if(typeof(plugin_previous_url) == 'undefined'){ plugin_previous_url = document.location.href; }
	plugin_url_watcher = function()
	{
		if(document.location.href != plugin_previous_url)
		{
			plugin_previous_url = document.location.href;

			//Reseting the forms Ref, https://jqueryvalidation.org/Validator.resetForm/

			dm_form.resetForm();
			cm_form.resetForm();
			in_form.resetForm();

			//Hiding error message(total) div
			jQuery('.danger').css("display","none");
		}
	}

	if(typeof(plugin_url_watcher_interval) !='undefined') window.clearInterval(plugin_url_watcher_interval);
	plugin_url_watcher_interval = window.setInterval(plugin_url_watcher,500);

});


jQuery(document).ready(function(){	
	
    jQuery(active_business_type_class+" div.dontknow-exact-address").hide();

    jQuery(active_business_type_class+' .dont-know-address').on("click",function(){    	
    	
    	 jQuery(active_business_type_class+' .nearesttown').removeClass("valid");
         jQuery(active_business_type_class+" div.to-address-wrapper").hide();
         jQuery(active_business_type_class+" div.dontknow-exact-address .nearesttown").val("");
         jQuery(active_business_type_class+" div.to-address-wrapper input.form-control").each(function(){
 			jQuery(this).val("");				
 		 });
         jQuery(active_business_type_class+" div.dontknow-exact-address").show();
         jQuery(active_business_type_class+' div.readyonly-address-wrapper').css({'display':'none'});
 		 jQuery(active_business_type_class+' div.readyonly-address-wrapper').text(''); 
 		// setTimeout(function() {
 		   jQuery(active_business_type_class+' .nearesttown').eq(0).focus();
 		// }, 100);
 		 
 		 
    });
    
    jQuery(active_business_type_class+' .know-address').on("click",function(){
    	
    	 jQuery(active_business_type_class+" div.to-address-wrapper").show();
         jQuery(active_business_type_class+" div.dontknow-exact-address").hide();
         
         jQuery(active_business_type_class+" div.to-address-wrapper input.form-control").each(function(){
			jQuery(this).val("");				
		});
         
        jQuery(active_business_type_class+' div.readyonly-address-wrapper').css({'display':'none'});
		jQuery(active_business_type_class+' div.readyonly-address-wrapper').text('');
		//setTimeout(function() {
			jQuery(active_business_type_class+' input[name="postcode_to"]').eq(0).focus();
		//}, 100);
         
    });
    
   

    // Custom postcode lookup - Event triggered of postcode look up
    
  
    
    jQuery("body").off('onResponsePlItems').on('onResponsePlItems',function(event,term){ 
    	
    	
    	   jQuery(auto_complete_plugin.selector).removeClass("valid");
     	   jQuery(active_business_type_class+' input[name="city_to"]').val("");
 		   jQuery(active_business_type_class+' input[name="postcode_to"]').val("");
 		   jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').text(""); 
		   jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').css({'display':'none'});
    	
    });
    
    jQuery("body").off('onSelectPlItem').on('onSelectPlItem',function(event,term){
    	
    	jQuery(auto_complete_plugin.selector).removeClass("pending");
    	
    	if(typeof(term) != "undefined" && term != '' && term != "No Data Found")	
   	    {
      	  
      	    postcode = '';
      	    townName = '';        					
      	    
  			var temp = term.split("(");
  			if(temp.length>1)
  			{
  				townName = temp[0].trim();
  				postcode = temp[1].replace(")","").trim();
  				
  				jQuery(active_business_type_class+' input[name="city_to"]').val(townName);
  				jQuery(active_business_type_class+' input[name="postcode_to"]').val(postcode);				
  					
  			}
  			
  			jQuery(auto_complete_plugin.selector).addClass("valid");
  			
  			jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').css({'display':'block'});
  			jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').text(term);
  				
  		 }
         else    	   
         {
           jQuery(auto_complete_plugin.selector).removeClass("valid"); 
      	   jQuery(active_business_type_class+' input[name="city_to"]').val("");
  		   jQuery(active_business_type_class+' input[name="postcode_to"]').val("");
  		   jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').text("");
  		   jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').css({'display':'none'});

         }
    	
    	
    });
    
   if(typeof(auto_complete_plugin.selector) != "undefined")
    {
    	jQuery(auto_complete_plugin.selector).keydown(function(){   	 
    		
    		if(jQuery(this)[0].value != '')
    		{	
    			jQuery(this).addClass("pending");    			
    		}
    		else
    		{
    			jQuery(this).removeClass("pending");  
    		}   		
    		
    	});  
    		
    	jQuery(auto_complete_plugin.selector).focusout(function() {
    		
    		jQuery(this).removeClass("pending");
    		
    	});
    }	
    
   /* postcodeLookupCallback = function(term)
    {   	
       if(typeof(term) != "undefined" && term != '' && term != "No Data Found")
 	   {
    	  
    	    postcode = '';
    	    townName = '';        					
    	    
			var temp = term.split("(");
			if(temp.length>1)
			{
				townName = temp[0].trim();
				postcode = temp[1].replace(")","").trim();
				
				jQuery(active_business_type_class+' input[name="city_to"]').val(townName);
				jQuery(active_business_type_class+' input[name="postcode_to"]').val(postcode);				
					
			}
			
			//jQuery(active_business_type_class+' input[name="town_postcode_to"]').val(term);
			jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').css({'display':'block'});
			jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').text(term);
				
		}
       else    	   
       {
    	   jQuery(active_business_type_class+' input[name="city_to"]').val("");
		   jQuery(active_business_type_class+' input[name="postcode_to"]').val("");
		   jQuery(active_business_type_class+' div.moving-to-wrapper .readyonly-address-wrapper').text("");
       } 
        
    }*/
    
   

     jQuery(active_business_type_class+" div.stress-moving-from input[name='postcode']").on("change",function(){
         postcode_from  = jQuery(active_business_type_class+" div.stress-moving-from input[name='postcode']").val();
       
         if(postcode_from.trim()!='' && (postcode_from.length>6 && postcode_from.length<9))
           {
               jQuery(active_business_type_class+" input[name=city]").addClass("pending");
               jQuery(active_business_type_class+" input[name=address]").addClass("pending");
               jQuery(active_business_type_class+" input[name=city]").removeClass("valid");
			   jQuery(active_business_type_class+" input[name=address]").removeClass("valid");
               
				jQuery.ajax({             			
             	  dataType: 'json',
             	  url: post_code_address_object.ajaxurl,
                  data: {action: "get_address_by_postcode", postcode_from : postcode_from},
             			success: function(result){
			                        
	                			jQuery(active_business_type_class+" input[name=city]").val(result.town[0]);
	        					jQuery(active_business_type_class+" input[name=address]").val(result.line_1);
			                        
             					jQuery(active_business_type_class+" div.stress-moving-from input:text").each(function(){
             						if (jQuery.trim(jQuery(this).val()).length != 0){             							
             							jQuery(this).addClass("valid");
             						}
             						else
             						{
             							jQuery(this).removeClass("valid");
             						}
             						jQuery(this).removeClass("pending");
             					});
             			}
                 });
             }
         });
     
         // below part is only for commercial(business) business type
         jQuery("div.stress-moving-from input[name='postcode_to']").on("change",function(){     	
        	 
        	  
         	  postcode_to  = jQuery(active_business_type_class+" div.stress-moving-from input[name='postcode_to']").val();
             

              if(postcode_to.trim()!='' && (postcode_to.length>6 && postcode_to.length<9))
              {	 
             	  jQuery(active_business_type_class+" input[name=city_to]").addClass("pending");
  				  jQuery(active_business_type_class+" input[name=address_to]").addClass("pending"); 
  				  jQuery(active_business_type_class+" input[name=city_to]").removeClass("valid");
 				  jQuery(active_business_type_class+" input[name=address_to]").removeClass("valid");
 				  
                   jQuery.ajax({

                 			//type: 'get',
                 		dataType: 'json',
                 		url: post_code_address_object.ajaxurl,
                        data: {action: "get_address_by_postcode", postcode_to : postcode_to},
                 		success: function(result){         				
                 			
		                        jQuery(active_business_type_class+" div.rightpart div.stress-moving-from input[name='city_to']").val(result.town_to[0]);
		                        jQuery(active_business_type_class+" div.rightpart div.stress-moving-from input[name='address_to']").val(result.line_1_to);
		                           
             					jQuery(active_business_type_class+" .to-address-wrapper input:text").each(function(){
             						if (jQuery.trim(jQuery(this).val()).length != 0){
             							
             							jQuery(this).addClass("valid");
             						}
             						else
             						{
             							jQuery(this).removeClass("valid");
             						}
             						jQuery(this).removeClass("pending");
             					});
             					
                 			}
                     });
                 }
           });
         
         
        // crafticlicks postcode lookup only for residential business type
         
    	 var cc_postcodeLookup = new clickToAddress({

    			accessToken: 'b6e12-06b5f-e1c4d-00fca',
    			domMode: 'name',
    			showLogo:false, 
    			cssPath: "/wp-content/plugins/removals-index-quote-form/css/cc-lookup.css",
    			historyTools:false,
    			defaultCountry: 'gbr',
    			getIpLocation: false,
    			countrySelector: false,
    			enabledCountries: ["gbr"],
    			countryMatchWith: 'iso_3',
    			disableAutoSearch: false,
    			texts: {
    		        default_placeholder: 'E.G. SK4 4BE'
    			}
    		});
         
    	
    	 cc_postcodeLookup.attach({
 			search:     'postcode_to',
 		},
 		{
 		 onResultSelected: function(classObj, domObject, resObj) { 				
 				
 				jQuery("#show-after-get input[name='address_to']").val(resObj.line_1);
 				jQuery("#show-after-get input[name='city_to']").val(resObj.locality);
 				jQuery("#show-after-get input[name='postcode_to']").val(resObj.postal_code);
 				
 				var addressHtml = "";
 				if(resObj.line_1 != "") {
 					addressHtml += resObj.line_1;
 				}				

 				if(resObj.locality != "") {

 					if( addressHtml != "" ) addressHtml +="<br>";
 					addressHtml += resObj.locality;
 				}

 				if(resObj.postal_code != "") {

 					if( addressHtml != "" ) addressHtml +=", ";
 					addressHtml += resObj.postal_code;
 				}

 				if(resObj.country_name != "") {

 					if( addressHtml != "" ) addressHtml +="<br>";
 					addressHtml += resObj.country_name;
 				}
 				
 				
 				var dm_form =  jQuery("#form").validate(); 				 
 				dm_form.element("#show-after-get #postcodeto");				
 				jQuery("#show-after-get .readyonly-address-wrapper").html("<div>"+addressHtml+"</div>").show();
 				jQuery("#show-after-get #postcodeto.valid").css({'background':'url(/wp-content/plugins/removals-index-quote-form/images/input-check.png) 97% 4px no-repeat','border':'1px solid #1ec279'});
 				
 			

 		},
 		onSearchFocus: function(classObj, domObject, resObj) {
 			
 			jQuery("#show-after-get #postcodeto.valid").css({'background':'none','border':'1px solid #66afe9'}); 			
 			jQuery("#show-after-get input[name='postcode_to']").removeClass('valid');
 			jQuery("#show-after-get input[name='postcode_to']").val('');
 			
 		}
 	  });
 
    	
         
     });
