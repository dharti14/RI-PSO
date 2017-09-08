/**

	Decoupling the lookup/validation technology from the form validations

	Email validation through Brite verify and phone number validation through Data8

	ri_validate_email_lookup and ri_validate_phone_lookup function is called from the main quote form js

*/


 function ri_validate_email_lookup(selector)
{
	 jQuery(selector).rules("add",
		{
		  "remote" :
		  {
			  url: '/wp-admin/admin-ajax.php?action=ri_email_verify',
			  type: "post",
			  data:
			  {
				  emailAddress: function()
				  {
					  return jQuery(selector).val();
				  }
			  }
		  }
		});
 }

 function ri_validate_phone_lookup(selector)
{
	 jQuery(selector).rules("add",
		{
		  "remote" :
		  {
			  url: '/wp-admin/admin-ajax.php?action=ri_validate_phone_data8',
			  type: "post",
			  data:
			  {
				  phoneNumber: function()
				  {
					  return jQuery(selector).val();
				  }
			  }
		  }
		});
 }
 // PCA predict implementation
   jQuery(document).ready(function(){
     jQuery("div.rightpart div.dontknow-exact-address").hide();

       jQuery('#dontknow').on("click",function(){
             jQuery("div.rightpart div.stress-moving-from").hide();
            jQuery("div.rightpart div.dontknow-exact-address").show();
       });
       jQuery('#knowexactaddress').on("click",function(){
            jQuery("div.rightpart div.stress-moving-from").show();
            jQuery("div.rightpart div.dontknow-exact-address").hide();
       });
       jQuery('#dontknowcommercialaddress').on("click",function(){
             jQuery("div.rightpart div.stress-moving-from").hide();
            jQuery("div.rightpart div.dontknow-exact-address").show();
       });
       jQuery('#knowexactcommercialaddress').on("click",function(){
            jQuery("div.rightpart div.stress-moving-from").show();
            jQuery("div.rightpart div.dontknow-exact-address").hide();
       });


              var options = { key: "EU75-PX99-PZ78-BY61" , search: { countries: "United Kingdom" }}
              var nearestfields = [
                { element: "nearesttown", field: "City", mode: pca.fieldMode.SEARCH},
                { element: "postcodeto", field: "PostalCode", mode: pca.fieldMode.POPULATE},
                { element: "city_to", field: "City", mode: pca.fieldMode.POPULATE},
                { element: "address_to", field: "Street", mode: pca.fieldMode.POPULATE}
              ];

              nearestFieldControl = new pca.Address(nearestfields,options);

              nearestFieldControl.listen("load", function(control) {

              nearestFieldControl.listen("populate", function (address) {

            jQuery("div.rightpart div.stress-moving-from").show();
            jQuery("div.rightpart div.dontknow-exact-address").hide();
            jQuery("div.rightpart div.stress-moving-from input:text").each(function(){
              if (jQuery.trim(jQuery(this).val()).length != 0){
                jQuery(this).addClass("valid");

              }
            });
          });
        });

        var nearestCommercialFields = [
          { element: "nearesttowncom", field: "City", mode: pca.fieldMode.SEARCH},
          { element: "commercialpostcodeto", field: "PostalCode", mode: pca.fieldMode.POPULATE},
          { element: "cityto", field: "City", mode: pca.fieldMode.POPULATE},
          { element: "addressto", field: "Street", mode: pca.fieldMode.POPULATE}
        ];

        nearestCommercialControl = new pca.Address(nearestCommercialFields,options);

        nearestCommercialControl.listen("load",function(control){
          nearestCommercialControl.listen("populate",function(address){

            jQuery("div.rightpart div.stress-moving-from").show();
            jQuery("div.rightpart div.dontknow-exact-address").hide();
            jQuery("input:text").each(function(){
              if (jQuery.trim(jQuery(this).val()).length != 0){
                jQuery(this).addClass("valid");
              }
          });
          });
        });



        jQuery("div.leftpart div.stress-moving-from input[name='postcode']").on("change paste keyup",function(){
            postcode_from  = jQuery("div.leftpart div.stress-moving-from input[name='postcode']").val();
            var commercial=0;

            if(postcode_from=="")
            {
                  postcode_from = jQuery('#form-business .removing-stress-frm-con .leftpart .stress-moving-from input[name="postcode"]').val();
                  commercial = 1;
            }
            if(postcode_from.trim()!='' && (postcode_from.length>6 && postcode_from.length<8))
              {
                  jQuery.ajax({

                			//type: 'get',
                			dataType: 'json',
                			url: post_code_address_object.ajaxurl,
                      data: {action: "get_address_by_postcode", postcode_from : postcode_from},
                			success: function(result){
                        if(commercial!=1)
                        {
                          jQuery("#form div.removing-stress-frm div.removing-stress-frm-con div.leftpart div.stress-moving-from input[name=city]").val(result.town[0]);
                					jQuery("#form div.removing-stress-frm div.removing-stress-frm-con div.leftpart div.stress-moving-from input[name=address]").val(result.line_1);
                					jQuery("#form div.removing-stress-frm div.removing-stress-frm-con div.leftpart div.stress-moving-from input[name=postcode]").val(postcode_from);
                        }
                        else {
                            jQuery("#form-business div.removing-stress-frm div.removing-stress-frm-con div.leftpart div.stress-moving-from input[name='city']").val(result.town[0]);
                            jQuery("#form-business div.removing-stress-frm div.removing-stress-frm-con div.leftpart div.stress-moving-from input[name='address']").val(result.line_1);
                            jQuery("#form-business div.removing-stress-frm div.removing-stress-frm-con div.leftpart div.stress-moving-from input[name='postcode']").val(postcode_from);
                        }
                					jQuery("input:text").each(function(){
                						if (jQuery.trim(jQuery(this).val()).length != 0){
                							jQuery(this).addClass("valid");
      	                    }
      			            });
                			}
                    });
                }
            });

            jQuery("div.rightpart div.stress-moving-from input[name='postcode_to']").on("change paste keyup",function(){

                postcode_to  = jQuery("div.rightpart div.stress-moving-from input[name='postcode_to']").val();
                  var commercial=0;
                if(postcode_to=='')
                {
                  postcode_to = jQuery('#form-business .removing-stress-frm-con .rightpart .stress-moving-from input[name="postcode_to"]').val();
                  commercial = 1;
                }

                 if(postcode_to.trim()!='' && (postcode_to.length>6 && postcode_to.length<8))
                 {
                      jQuery.ajax({

                    			//type: 'get',
                    			dataType: 'json',
                    			url: post_code_address_object.ajaxurl,
                          data: {action: "get_address_by_postcode", postcode_to : postcode_to},
                    			success: function(result){
                            if(commercial!=1)
                            {
                              jQuery("#form div.removing-stress-frm div.removing-stress-frm-con div.rightpart div.stress-moving-from input[name=city_to]").val(result.town_to[0]);
        					            jQuery("#form div.removing-stress-frm div.removing-stress-frm-con div.rightpart div.stress-moving-from input[name=address_to]").val(result.line_1_to);
                    					jQuery("#form div.removing-stress-frm div.removing-stress-frm-con div.rightpart div.stress-moving-from input[name=postcode_to]").val(postcode_to);
                            }
                            else {
                              jQuery("#form-business div.removing-stress-frm div.removing-stress-frm-con div.rightpart div.stress-moving-from input[name='city_to']").val(result.town_to[0]);
                              jQuery("#form-business div.removing-stress-frm div.removing-stress-frm-con div.rightpart div.stress-moving-from input[name='address_to']").val(result.line_1_to);
                              jQuery("#form-business div.removing-stress-frm div.removing-stress-frm-con div.rightpart div.stress-moving-from input[name='postcode_to']").val(postcode_to);
                            }
                    					jQuery("input:text").each(function(){
                    						if (jQuery.trim(jQuery(this).val()).length != 0){
                    							jQuery(this).addClass("valid");
                                }
          			            });
                    			}
                        });
                    }
              });
        });
