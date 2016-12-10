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
	
	