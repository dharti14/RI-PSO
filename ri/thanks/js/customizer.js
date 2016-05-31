// JavaScript Document
$( document ).ready(function() {
		
		function phoneValidation(key) {
			var error = 0;
			var phoneLength = $(this).val().length;
			var firsTwoValue = $(this).val().substring(0, 2);
			var firsFourValue = $(this).val().substring(0, 4);
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
				$(this).removeClass("valid");
				$(this).addClass("error");
			}else{
				$(this).addClass("valid");
				$(this).removeClass("error");
			}
        }
		
	$.validator.addMethod("phoneValidate", function (phone_number, element) {
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
			
	$("#form input[name='phone']").keypress(phoneValidation);
		
        //form validation rules
        $("#form").validate({
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

    	
		$(".get-my-quote-second").click(function() {
    		$("#form").submit();
 		 });
		 
	 	$('#form input').keydown(function(e) {
			if (e.keyCode == 13) {
    			$("#form").submit();
			}
 		 });

	$(".get-my-quote").click(function(){
		$(".looking-for").hide();
		$(".will-removal").hide();
		//$("#hide-after-get").hide();
		$(".free-quotes-now").hide();
		$(".slide-main").hide();
		$(".companies").hide();
		$(".find-experts").hide();
		$(".footer").hide();
		var postcode_from = $("#postcode_from").val();
		var postcode_to = $("#postcode_to").val();
		var buseness_type = $("input[name=buseness_type]:checked").val();
			if(buseness_type == "International"){ postcode_to = ''; }
		var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		if(buseness_type == "Business Removal"){
			$("#show-after-get-business").css("display","block");
			$('html, body').animate({
        		scrollTop: $('#show-after-get-business').offset().top
    		}, 300);
		}else if(buseness_type == "International"){
			$("#show-after-get-international").css("display","block");
			$('html, body').animate({
        		scrollTop: $('#show-after-get-international').offset().top
    		}, 300);
		}else{	
			$("#show-after-get").css("display","block");
			$('html, body').animate({
        		scrollTop: $('#show-after-get').offset().top
    		}, 300);
		}
		
		$.ajax({
			type: "POST",
			url: "ajaxaddress.php",
			data: dataString,
			success: function(result){
				//alert(result);
				var json_obj = $.parseJSON(result);
				//alert(result);
				$("input[name=city]").val(json_obj.town[0]);
				$("input[name=postcode]").val(postcode_from);
				$("input[name=address]").val(json_obj.line_1);
				$("input[name=city_to]").val(json_obj.town_to[0]);
				$("input[name=postcode_to]").val(postcode_to);
				$("input[name=address_to]").val(json_obj.line_1_to);
				$("input:text").each(function(){
					if ($.trim($(this).val()).length != 0){
						$(this).addClass("valid");
						
					}
					
				});

				
/*				$(".header").addClass("hide-after-get");
				$(".looking-for").addClass("hide-after-get");
				$(".will-removal").addClass("hide-after-get");
				$("#hide-after-get").addClass("hide-after-get");*/
				//$(".header").hide();
				
				
			},
			
		});
		
	});
	$(".get-my-quote2").click(function(){

		var postcode_from = $("#postcode_from2").val();
		var postcode_to = $("#postcode_to2").val();
		var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "ajaxaddress.php",
			data: dataString,
			success: function(result){
				//alert(result);
				var json_obj = $.parseJSON(result);
				
				$("input[name=city]").val(json_obj.town[0]);
				$("input[name=postcode]").val(postcode_from);
				$("input[name=address]").val(json_obj.line_1);
				$("input[name=city_to]").val(json_obj.town_to[0]);
				$("input[name=postcode_to]").val(postcode_to);
				$("input[name=address_to]").val(json_obj.line_1_to);
				$("#form input:text").each(function(){
					if ($.trim($(this).val()).length != 0){
						$(this).addClass("valid");
						
					}
					
				});
				$("#show-after-get").css("display","block")
/*				$(".header").addClass("hide-after-get");
				$(".looking-for").addClass("hide-after-get");
				$(".will-removal").addClass("hide-after-get");
				$("#hide-after-get").addClass("hide-after-get");*/
				//$(".header").hide();
				$(".looking-for").hide();
				$(".will-removal").hide();
				//$("#hide-after-get").hide();
				$(".free-quotes-now").hide();
				$(".slide-main").hide();
				$(".companies").hide();
				$(".find-experts").hide();
				
			},
			
		});
		
	});
	$('#form1 input').keydown(function(e) {
		
    	if (e.keyCode == 13) {
        $(".looking-for").hide();
		$(".will-removal").hide();
		//$("#hide-after-get").hide();
		$(".free-quotes-now").hide();
		$(".slide-main").hide();
		$(".companies").hide();
		$(".find-experts").hide();
		$(".footer").hide();
		var postcode_from = $("#postcode_from").val();
		var postcode_to = $("#postcode_to").val();
		var buseness_type = $("input[name=buseness_type]:checked").val();
			if(buseness_type == "International"){ postcode_to = ''; }
		var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		if(buseness_type == "Business Removal"){
			$("#show-after-get-business").css("display","block");
			$('html, body').animate({
        		scrollTop: $('#show-after-get-business').offset().top
    		}, 300);
		}else if(buseness_type == "International"){
			$("#show-after-get-international").css("display","block");
			$('html, body').animate({
        		scrollTop: $('#show-after-get-international').offset().top
    		}, 300);
		}else{	
			$("#show-after-get").css("display","block");
			$('html, body').animate({
        		scrollTop: $('#show-after-get').offset().top
    		}, 300);
		}
		$.ajax({
			type: "POST",
			url: "ajaxaddress.php",
			data: dataString,
			success: function(result){
				//alert(result);
				var json_obj = $.parseJSON(result);
				//alert(result);
				$("input[name=city]").val(json_obj.town[0]);
				$("input[name=postcode]").val(postcode_from);
				$("input[name=address]").val(json_obj.line_1);
				$("input[name=city_to]").val(json_obj.town_to[0]);
				$("input[name=postcode_to]").val(postcode_to);
				$("input[name=address_to]").val(json_obj.line_1_to);
				$("#form input:text").each(function(){
					if ($.trim($(this).val()).length != 0){
						$(this).addClass("valid");
						
					}
					
				});
				if(buseness_type == "Business Removal"){
					$("input[name=companyname]").css("display","block");
					$("input[name=companyname]").removeAttr('disabled');
					$("input[name=companyname]").attr('required','required');
				}else{
					$("input[name=companyname]").css("display","none");
					$("input[name=companyname]").attr('disabled','disabled');
				}
				if(buseness_type == "International"){
					$("select[name=country]").css("display","inline");
					$("select[name=country]").removeAttr('disabled');
					$("select[name=countryTo]").css("display","inline");
					$("select[name=countryTo]").removeAttr('disabled');
					$("select[name=country]").attr('required','required');
					$("select[name=countryTo]").attr('required','required');
				}else{
					$("select[name=country]").css("display","none");
					$("select[name=country]").attr('disabled','disabled');
					$("select[name=countryTo]").css("display","none");
					$("select[name=countryTo]").removeAttr('disabled');
					$("select[name=country]").removeAttr('required');
					$("select[name=countryTo]").removeAttr('required');
				}
				$("#show-after-get").css("display","block")
/*				$(".header").addClass("hide-after-get");
				$(".looking-for").addClass("hide-after-get");
				$(".will-removal").addClass("hide-after-get");
				$("#hide-after-get").addClass("hide-after-get");*/
				//$(".header").hide();
				
			},
			
		});
		
	
    	}
	});
	$('#form2 input').keydown(function(e) {
		
    	if (e.keyCode == 13) {
        	
		var postcode_from = $("#postcode_from2").val();
		var postcode_to = $("#postcode_to2").val();
		var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		$.ajax({
			type: "POST",
			url: "ajaxaddress.php",
			data: dataString,
			success: function(result){
				//alert(result);
				var json_obj = $.parseJSON(result);
				
				$("input[name=city]").val(json_obj.town[0]);
				$("input[name=postcode]").val(postcode_from);
				$("input[name=address]").val(json_obj.line_1);
				$("input[name=city_to]").val(json_obj.town_to[0]);
				$("input[name=postcode_to]").val(postcode_to);
				$("input[name=address_to]").val(json_obj.line_1_to);
				$("#form input:text").each(function(){
					if ($.trim($(this).val()).length != 0){
						$(this).addClass("valid");
						
					}
					
				});
				$("#show-after-get").css("display","block")
/*				$(".header").addClass("hide-after-get");
				$(".looking-for").addClass("hide-after-get");
				$(".will-removal").addClass("hide-after-get");
				$("#hide-after-get").addClass("hide-after-get");*/
				//$(".header").hide();
				$(".looking-for").hide();
				$(".will-removal").hide();
				//$("#hide-after-get").hide();
				$(".free-quotes-now").hide();
				$(".slide-main").hide();
				$(".companies").hide();
				$(".find-experts").hide();
				$(".footer").hide();
				 
			},
			
		});
		
	
    	}
	});
	
	$('.bed-radios-container').click(function(){
		$('.bed-radios-container').removeClass("bed-radios-container-sel");
		
		if($(this).attr("rel") == "bed0"){
			
		}else{
			$(this).addClass("bed-radios-container-sel");
		}
		
		$(this).find("input[type='radio']").prop("checked", true);
		$(".removing-stress-frm h4.property span").remove();
		$(".removing-stress-frm h4.property").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
	});
	
	$("#show-after-get input[name='property_type_from']").click(function(){
		if($(this).val() == "Apartment / Flat"){
			$("#show-after-get #appartment-floor-from").css("display","block");
			$("#show-after-get select[name='floor_from']").prop("required",true);
			$("#show-after-get input[name='lift_available_from']").prop("required",true);
		}else{
			$("#show-after-get #appartment-floor-from").css("display","none");
			$("#show-after-get select[name='floor_from']").prop("required",false);
			$("#show-after-get input[name='lift_available_from']").prop("required",false);
		}
		
		$("#show-after-get .leftpart .redio-with-text h5 span").remove();
		$("#show-after-get .leftpart .redio-with-text h5").append('<span class="vaild-check property_type"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("#show-after-get input[name='property_type_to']").click(function(){
		if($(this).val() == "Apartment / Flat"){
			$("#show-after-get #appartment-floor-to").css("display","block");
			$("#show-after-get select[name='floor_to']").prop("required",true);
			$("#show-after-get input[name='lift_available_to']").prop("required",true);
		}else{
			$("#show-after-get #appartment-floor-to").css("display","none");
			$("#show-after-get select[name='floor_to']").prop("required",false);
			$("#show-after-get input[name='lift_available_to']").prop("required",false);
		}
		$("#show-after-get .rightpart .redio-with-text h5 span").remove();
		$("#show-after-get .rightpart .redio-with-text h5").append('<span class="vaild-check property_type"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("#show-after-get input[name='lift_available_from']").click(function(){
		$("#show-after-get .leftpart .redio-with-text2 span").remove();
		$("#show-after-get .leftpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("#show-after-get input[name='lift_available_to']").click(function(){
		$("#show-after-get .rightpart .redio-with-text2 span").remove();
		$("#show-after-get .rightpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("#show-after-get input[name='parking_available_from']").click(function(){
		$("#show-after-get .leftpart .redio-with-text3 span").remove();
		$("#show-after-get .leftpart .redio-with-text3").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("#show-after-get input[name='parking_available_to']").click(function(){
		$("#show-after-get .rightpart .redio-with-text3 span").remove();
		$("#show-after-get .rightpart .redio-with-text3").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	
	$("#show-after-get input[name='packing_service']").click(function(){
		$("#show-after-get .packing-service span").remove();
		$("#show-after-get .packing-service").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("input[name='dismantle']").click(function(){
		$(".dismantle span").remove();
		$(".dismantle").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("input[name='storage']").click(function(){
		$(".storage span").remove();
		$(".storage").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("input[name='out_of_business']").click(function(){
		$(".out_of_business span").remove();
		$(".out_of_business").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("input[name='any_addition_information']").click(function(){
		$(".step-4-checkbox span").remove();
		$(".step-4-checkbox").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("select[name='country']").change(function(){
		if($(this).val() != ""){
			$("span.country-select").remove();
			$(this).after('<span class="vaild-check country-select"><img src="images/input-check.png" alt=""></span>');
		}else{
			$("span.country-select").remove();
		}
		
	});
		
	$("#show-after-get select[name='floor_from']").change(function(){
		if($(this).val() != ""){
			$("#show-after-get span.floor_from").remove();
			$(this).after('<span class="vaild-check floor_from"><img src="images/input-check.png" alt=""></span>');
		}else{
			$("#show-after-get span.floor_from").remove();
		}
	});
	$("#show-after-get select[name='floor_to']").change(function(){
		if($(this).val() != ""){
			$("#show-after-get span.floor_to").remove();
			$(this).after('<span class="vaild-check floor_to"><img src="images/input-check.png" alt=""></span>');
		}else{
			
			$("#show-after-get span.floor_to").remove();
		}
	});

	//form-business validation rules
		$("#form-business input[name='phone']").keypress(phoneValidation);
        $("#form-business").validate({
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

    	
		$(".get-my-quote-second-business").click(function() {
    		$("#form-business").submit();
 		 });
		 
	 	$('#form-business input').keydown(function(e) {
			if (e.keyCode == 13) {
    			$("#form-business").submit();
			}
 		 });


		$("#form-business input[name='property_type_from']").click(function(){
			if($(this).val() == "Apartment / Flat"){
				$("#form-business #appartment-floor-from").css("display","block");
				$("#form-business select[name='floor_from']").prop("required",true);
				$("#form-business input[name='lift_available_from']").prop("required",true);
			}else{
				$("#form-business #appartment-floor-from").css("display","none");
				$("#form-business select[name='floor_from']").prop("required",false);
				$("#form-business input[name='lift_available_from']").prop("required",false);
			}
			
			$("#form-business .leftpart .redio-with-text h5 span").remove();
			$("#form-business .leftpart .redio-with-text h5").append('<span class="vaild-check property_type"><img src="images/input-check.png" alt=""></span>');
		
		});

		$("#form-business input[name='property_type_to']").click(function(){
			if($(this).val() == "Apartment / Flat"){
				$("#form-business #appartment-floor-to").css("display","block");
				$("#form-business select[name='floor_to']").prop("required",true);
				$("#form-business input[name='lift_available_to']").prop("required",true);
			}else{
				$("#form-business #appartment-floor-to").css("display","none");
				$("#form-business select[name='floor_to']").prop("required",false);
				$("#form-business input[name='lift_available_to']").prop("required",false);
			}
			$("#form-business .rightpart .redio-with-text h5 span").remove();
			$("#form-business .rightpart .redio-with-text h5").append('<span class="vaild-check property_type"><img src="images/input-check.png" alt=""></span>');
			
		});

		$("#form-business select[name='floor_from']").change(function(){
			if($(this).val() != ""){
				$("#form-business span.floor_from").remove();
				$(this).after('<span class="vaild-check floor_from"><img src="images/input-check.png" alt=""></span>');
			}else{
				$("#form-business span.floor_from").remove();
			}
		});
		
		$("#form-business select[name='floor_to']").change(function(){
			if($(this).val() != ""){
				$("#form-business span.floor_to").remove();
				$(this).after('<span class="vaild-check floor_to"><img src="images/input-check.png" alt=""></span>');
			}else{
				
				$("#form-business span.floor_to").remove();
			}
		});
		
		$("#form-business input[name='lift_available_from']").click(function(){
			$("#form-business .leftpart .redio-with-text2 span").remove();
			$("#form-business .leftpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
		});
	
		$("#form-business input[name='lift_available_to']").click(function(){
			$("#form-business .rightpart .redio-with-text2 span").remove();
			$("#form-business .rightpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
		});
	
		$("#form-business input[name='parking_available_from']").click(function(){
			$("#form-business .leftpart .redio-with-text3 span").remove();
			$("#form-business .leftpart .redio-with-text3").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
		});
	
		$("#form-business input[name='parking_available_to']").click(function(){
			$("#form-business .rightpart .redio-with-text3 span").remove();
			$("#form-business .rightpart .redio-with-text3").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
		});
	
	
		$("#form-business input[name='packing_service']").click(function(){
			$("#form-business .packing-service span").remove();
			$("#form-business .packing-service").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
		});

		$("#form-international input[name='parking_available_from']").click(function(){
			
			if($(this).val() == "No"){
				$("#form-international .parking-issues-from").css("display","block");
			}else{
				$("#form-international .parking-issues-from").css("display","none");
			}
			
		});
		
	//form-international validation rules
		$("#form-international input[name='phone']").keypress(phoneValidation);
        $("#form-international").validate({
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

    	
		$(".get-my-quote-second-international").click(function() {
    		$("#form-international").submit();
 		 });
		 
	 	$('#form-international input').keydown(function(e) {
			if (e.keyCode == 13) {
    			$("#form-business").submit();
			}
 		 });
		
		$("#form-international input[name='property_type_from']").click(function(){
			if($(this).val() == "Apartment / Flat"){
				$("#form-international #appartment-floor-from").css("display","block");
				$("#form-international select[name='floor_from']").prop("required",true);
				$("#form-international input[name='lift_available_from']").prop("required",true);
			}else{
				$("#form-international #appartment-floor-from").css("display","none");
				$("#form-international select[name='floor_from']").prop("required",false);
				$("#form-international input[name='lift_available_from']").prop("required",false);
			}
			
			$("#form-international .leftpart .redio-with-text h5 span").remove();
			$("#form-international .leftpart .redio-with-text h5").append('<span class="vaild-check property_type"><img src="images/input-check.png" alt=""></span>');
		
		});

		$("#form-international input[name='property_type_to']").click(function(){
			if($(this).val() == "Apartment / Flat"){
				$("#form-international #appartment-floor-to").css("display","block");
				$("#form-international select[name='floor_to']").prop("required",true);
				$("#form-international input[name='lift_available_to']").prop("required",true);
			}else{
				$("#form-international #appartment-floor-to").css("display","none");
				$("#form-international select[name='floor_to']").prop("required",false);
				$("#form-international input[name='lift_available_to']").prop("required",false);
			}
			$("#form-international .rightpart .redio-with-text h5 span").remove();
			$("#form-international .rightpart .redio-with-text h5").append('<span class="vaild-check property_type"><img src="images/input-check.png" alt=""></span>');
			
		});
		
		$("#form-international select[name='floor_from']").change(function(){
		if($(this).val() != ""){
			$("#form-international span.floor_from").remove();
			$(this).after('<span class="vaild-check floor_from"><img src="images/input-check.png" alt=""></span>');
		}else{
			$("#form-international span.floor_from").remove();
		}
	});
	
	$("#form-international select[name='floor_to']").change(function(){
		if($(this).val() != ""){
			$("#form-international span.floor_to").remove();
			$(this).after('<span class="vaild-check floor_to"><img src="images/input-check.png" alt=""></span>');
		}else{
			
			$("#form-international span.floor_to").remove();
		}
	});
	
		$("#form-international input[name='lift_available_from']").click(function(){
		$("#form-international .leftpart .redio-with-text2 span").remove();
		$("#form-international .leftpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	$("#form-international input[name='lift_available_to']").click(function(){
		$("#form-international .rightpart .redio-with-text2 span").remove();
		$("#form-international .rightpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	
	$("#form-international input[name='packing_service']").click(function(){
		$("#form-international .packing-service span").remove();
		$("#form-international .packing-service").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
	});

	$("#form-international select[name='countryTo']").change(function(){
		if($(this).val() != ""){
			$("#form-international .select-item").addClass('valid');
		}else{
			$("#form-international .select-item").removeClass('valid');
		}
	});
	
});