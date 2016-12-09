/**
	
	Decoupling the lookup/validation technology from the form validations
		
	Email validation  through Brite verify 
	
	addEmailValidation function is called from the main form validation js	
	
*/


 function addEmailValidation(selector)
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
	
	