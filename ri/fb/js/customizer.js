// JavaScript Document

$( document ).ready(function() {
		
	//custom validators
	
	$.validator.addMethod("phoneValidate", function (phone_number, element) {
           	
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
	
	$.validator.addMethod("dateValidate", function(value, element, params){
		
		
		//var frm = $(element).closest('form');
		
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
	
	
	$.validator.addMethod("onlyChars", function(value, element, params){
		var matches = value.match(/\d+/g);
		if(matches!=null && matches.length>0)
		{
			return false;
		}
		return true;
	}, "Invalid name. Name must be atleast 2 chars long and can not contain digits.");
	
	
	$.validator.addMethod("additional_info_valid", function(value, element, params){
		
		
		var frm = $(element).closest('form');
		
		if($(frm).find("input[name='any_addition_information']:checked").val() == "Yes")
		{
			if(value == '')
			{
				return false;
			}
		}			
		return true;
		
	}, "Additional information is required");
	
	
	
	$("input[name='any_addition_information']").click(function(){
		
		var frm = $(this).closest("form"); 
		$(frm).find("textarea[name='additional_info']").valid();
		
	});
			

		
        //form validation rules
        $("#form").validate({
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
                rules: {
					bedrooms: "required",
                    name: {
                    	required:true,
                    	minlength:2,
                    	onlyChars: true                    	
                    },
					phone: "required",
					postcode: "required",
					address: "required",
                    city: "required",
					city_to: "required",
					property_type_from:"required",
					property_type_to:"required",
					packing_service: "required",
					dismantle : "required",
					storage : "required",
					date: {
						required: true,
						dateValidate: true
					},					
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
                    agree: "required",
                    additional_info: "additional_info_valid"
                    	
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
					$("div.danger span").html("You have missed "	+ errors + ((errors>1)?" fields":" field") + ". Please correct and re-submit.");
					this.defaultShowErrors();
				  }
				  else{
					$("div.danger").hide();
					this.defaultShowErrors();
				  }				  
				},
                messages: {
					bedrooms: "Size of current property is required",
                    name: {
                    	required:"Your name is required",
                    	minlength:"Your name should be atleast 2 characters long"
                    		},
                    phone: "Please enter a valid phone number",
					email: "Your email address is required",
                  	postcode: "Your post code address is required",
					address: "Your address is required",
                    city: "Your city is required",
					city_to: "Your city is required",
					property_type_from:"Property type is required",
					property_type_to:"Property type is required",
					packing_service: "Packing service is required",
                    dismantle: "Dismantle / Reassemble is required",
					storage: "Storage is required",
					date:{
							required: "Anticipated moving date is required",
							dateValidate: "Invalid moving date. Date must be in dd/mm/yyyy format and must be a future date."							
						}
                },		
                
                submitHandler: function(form) {
                	
                	if(jQuery(form).find(".get-my-quote-second").attr('disabled') == 'disabled') return false;
                    jQuery(form).find(".get-my-quote-second").attr('disabled','disabled');
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
				
			},
			
		});
		
	});
	
	$(".get-my-quote2").click(function(){

		var postcode_from = $("#postcode_from2").val();
		var postcode_to = $("#postcode_to2").val();
		var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		$(".looking-for").hide();
		$(".will-removal").hide();
		//$("#hide-after-get").hide();
		$(".free-quotes-now").hide();
		$(".slide-main").hide();
		$(".companies").hide();
		$(".find-experts").hide();
		$("#show-after-get").css("display","block");
		$('html, body').animate({
        	scrollTop: $('#show-after-get').offset().top
    	}, 300);
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

				
			},
			
		});
		
	});
	$(".get-my-quote3").click(function(){

		var postcode_from = $("#postcode_from3").val();
		var postcode_to = $("#postcode_to3").val();
		var dataString = 'postcode_from='+ postcode_from + '&postcode_to='+ postcode_to;
		// AJAX Code To Submit Form.
		//alert(dataString);
		$(".looking-for").hide();
		$(".will-removal").hide();
		//$("#hide-after-get").hide();
		$(".free-quotes-now").hide();
		$(".slide-main").hide();
		$(".companies").hide();
		$(".find-experts").hide();
		$("#show-after-get").css("display","block");
		$('html, body').animate({
        	scrollTop: $('#show-after-get').offset().top
    	}, 300);
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
			
			$(".step-4-checkbox span").remove();
			$(".step-4-checkbox").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
			$('textarea[name="additional_info"]').show();
			$("input[name='any_addition_information']").attr( 'checked', 'checked' );
			$('textarea[name="additional_info"]').valid();
			
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
		if($(this).val() == "Ground"){ 
			$("input[name='lift_available_from']").attr( 'checked', 'checked' );
			$("#show-after-get .leftpart .redio-with-text2 span").remove();
			$("#show-after-get .leftpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		}
		if($(this).val() != ""){
			$("#show-after-get span.floor_from").remove();
			$(this).after('<span class="vaild-check floor_from"><img src="images/input-check.png" alt=""></span>');
		}else{
			$("#show-after-get span.floor_from").remove();
		}
	});
	$("#show-after-get select[name='floor_to']").change(function(){
		if($(this).val() == "Ground"){ 
			$("input[name='lift_available_to']").attr( 'checked', 'checked' );
			$("#show-after-get .rightpart .redio-with-text2 span").remove();
			$("#show-after-get .rightpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		}
		if($(this).val() != ""){
			$("#show-after-get span.floor_to").remove();
			$(this).after('<span class="vaild-check floor_to"><img src="images/input-check.png" alt=""></span>');
		}else{
			
			$("#show-after-get span.floor_to").remove();
		}
	});

		//form-business validation rules		
        $("#form-business").validate({
        		
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
                rules: {
					bedrooms: "required",
					 name: {
	                    	required:true,
	                    	minlength:2,
	                    	onlyChars: true                    	
	                    },					
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
                    agree: "required",
                    additional_info: "additional_info_valid"
                },
				showErrors: function(errorMap, errorList) {
				var errors = this.numberOfInvalids();
				if(errors > 0){
				
					$("div.danger").show();
					$("div.danger span").html("You have missed "	+ errors + ((errors>1)?" fields":" field") + ". Please correct and re-submit.");
					this.defaultShowErrors();
				  }
				  else{
					$("div.danger").hide();
					this.defaultShowErrors();
				  }				  
				},
                messages: {
					bedrooms: "Size of current property is required",
				    name: {
                    	required:"Your name is required",
                    	minlength:"Your name should be atleast 2 characters long"
                    	},
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
                                        
                    if(jQuery(form).find(".get-my-quote-second-business").attr('disabled') == 'disabled') return false;
                    jQuery(form).find(".get-my-quote-second-business").attr('disabled','disabled');
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
			if($(this).val() == "Ground"){ 
				$("input[name='lift_available_from']").attr( 'checked', 'checked' );
				$("#form-business .leftpart .redio-with-text2 span").remove();
				$("#form-business .leftpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
			}
			if($(this).val() != ""){
				$("#form-business span.floor_from").remove();
				$(this).after('<span class="vaild-check floor_from"><img src="images/input-check.png" alt=""></span>');
			}else{
				$("#form-business span.floor_from").remove();
			}
		});
		
		$("#form-business select[name='floor_to']").change(function(){
			if($(this).val() == "Ground"){ 
				$("input[name='lift_available_to']").attr( 'checked', 'checked' );
				$("#form-business .rightpart .redio-with-text2 span").remove();
				$("#form-business .rightpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
			}
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
		//$("#form-international input[name='phone']").keypress(phoneValidation);
        $("#form-international").validate({
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
                rules: {
					bedrooms: "required",
					name: {
	                    	required:true,
	                    	minlength:2,
	                    	onlyChars: true                    	
	                    },					
					postcode: "required",
					address: "required",
                    city: "required",
					city_to: "required",
					property_type_from:"required",
					property_type_to:"required",
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
                    agree: "required",
                    additional_info: "additional_info_valid"
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
						$("div.danger span").html("You have missed "	+ errors + ((errors>1)?" fields":" field") + ". Please correct and re-submit.");
						this.defaultShowErrors();
					  }
					  else{
						$("div.danger").hide();
						this.defaultShowErrors();
					  }				  
				},		
                messages: {
					bedrooms: "Size of current property is required",
					name: {
                    	required:"Your name is required",
                    	minlength:"Your name should be atleast 2 characters long"
                    	},
                    phone: "Please enter a valid phone number",
					email: "Your email address is required",
                  	postcode: "Your post code address is required",
					address: "Your address is required",
                    city: "Your city is required",
					city_to: "Your city is required",
					property_type_from:"Property type is required",
					property_type_to:"Property type is required",					
					packing_service: "Packing service is required",
                    dismantle: "Dismantle / Reassemble is required",
					storage: "Storage is required",
					date: "Anticipated moving date is required",
                },						
                submitHandler: function(form) {
					                    
                    if(jQuery(form).find(".get-my-quote-second-international").attr('disabled') == 'disabled') return false;
                    jQuery(form).find(".get-my-quote-second-international").attr('disabled','disabled');
                    form.submit();
                    
                }
            });

    	
		$(".get-my-quote-second-international").click(function() {
    		$("#form-international").submit();
 		 });
		 
	 	$('#form-international input').keydown(function(e) {
			if (e.keyCode == 13) {
    			$("#form-international").submit();
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
			if($(this).val() == "Ground"){ 
				$("#form-international .leftpart .redio-with-text2 span").remove();
				$("#form-international .leftpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
				$("input[name='lift_available_from']").attr( 'checked', 'checked' );
			}
			if($(this).val() != ""){
				$("#form-international span.floor_from").remove();
				$(this).after('<span class="vaild-check floor_from"><img src="images/input-check.png" alt=""></span>');
			}else{
				$("#form-international span.floor_from").remove();
			}
		});
	
	$("#form-international select[name='floor_to']").change(function(){
		if($(this).val() == "Ground"){ 
			
			$("#form-international .rightpart .redio-with-text2 span").remove();
			$("#form-international .rightpart .redio-with-text2").append('<span class="vaild-check"><img src="images/input-check.png" alt=""></span>');
		
			$("input[name='lift_available_to']").attr( 'checked', 'checked' );
		}
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
	
	$("input[name='shipping_method']").click(function(){
			$(".shipping-method span").remove();
			$(".shipping-method").append('<span class="vaild-check" style="margin-left: 7px;"><img src="images/input-check.png" alt=""></span>');
		
	});
	
	
	
});

