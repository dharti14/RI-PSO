<?php
ob_start();

if ($_POST) 
{

	$apiKey ="";
		
	$formType = "";
	
	$ri_page_id = "";
		
	if( isset($_POST['form-type']) && isset($_POST['ri_page_id']) )
	{
		//Getting the api url from the admin panel ( settings>>RI Quote Form )
		$api_url = $this->apiUrl;
		
		$ri_form_type = $_POST['form-type'];

		
		//Getting the page id from hidden field in the form
		$ri_page_id = $_POST['ri_page_id'];
		
		
		//Using the page id getting the associated thank you (conversion) page id
		$ri_thanks_page_id = get_post_meta( $ri_page_id, '_conversion_page', true );
		
		
		//Using the page id getting the pinlocal source key (used to identify the lead source)
		$apiKey = get_post_meta( $ri_page_id, '_pinlocal_source_key', true );
		
	
		$storage = "";	//possible values "Yes/No"
		$asembly = "";	//possible values "Yes/No"
		$packing = "";	//possible values "Yes/No"
		$altphone = "";
		$lift_available_from = "";
		$lift_available_to = "";
		$parking_available_from = "";
		$parking_available_to = "";
		$country_from = "";
		$property_type_from = "";
		$property_type_to = "";
		$out_of_business = "";
		if(isset($_POST['storage']))
			$storage = urlencode($_POST["storage"]);
		if(isset($_POST['dismantle']))
			$asembly=urlencode($_POST["dismantle"]);
		if(isset($_POST['packing_service']))
			$packing=urlencode($_POST["packing_service"]);
		if(isset($_POST['altphone']))
			$altphone = $_POST["altphone"];
		if(isset($_POST["lift_available_from"]))
			$lift_available_from = $_POST["lift_available_from"];
		if(isset($_POST["lift_available_to"]))
			$lift_available_to = $_POST["lift_available_to"];
		
		if(isset($_POST['parking_available_from']))
			$parking_available_from=urlencode($_POST["parking_available_from"]);
		if(isset($_POST['parking_available_to']))
			$parking_available_to = $_POST["parking_available_to"];
			
		if(isset($_POST['country_from']))
			$country_from = $_POST["country_from"];
		if(isset($_POST['property_type_from']))
			$property_type_from = $_POST["property_type_from"];
		if(isset($_POST['property_type_to']))
			$property_type_to = $_POST["property_type_to"];
		if(isset($_POST["out_of_business"]))
			$out_of_business = urlencode($_POST["out_of_business"]);
		
		//split full name to first name and last name
		$firstName = "";
		$lastName = "";
		$name = explode(" ",$_POST["fullname"]);
		$firstName = array_shift($name);
		$lastName = implode(" ", $name);


		//Get data from your form POST and assign it to appropriate lead fields.
		
		if($ri_form_type==0)
		{
			$form = 35; //Domestic Removal
				
			$fields = array(	
					'firstName'=>urlencode($firstName),							// *required field
					'lastName'=>urlencode($lastName),
					'email'=>urlencode($_POST["email"]),						// *required field
					'phone'=>urlencode($_POST["phone"]),						// *required field
					'altPhone'=>urlencode($altphone),
					'addressLine1'=> urlencode($_POST["houseno"]),				//moving from house no or address line 1
					'addressLine2'=> urlencode($_POST["address"]),				//moving from address line2
					'city'=> urlencode($_POST["city"]),							//moving from city
					'postCode'=> urlencode($_POST["postcode"]),					//moving from post code. *required field
					'from_property_type' => urlencode($property_type_from),		//possible values: House,Appartment/Flat,Bungalow
					'from_floor'=> urlencode($_POST["floor_from"]),			
					'from_lift_available' => urlencode($lift_available_from),//possible values: Yes/No
					'no_of_bedrooms'=>urlencode($_POST["bedrooms"]),						// *required field
					
					'to_postcode'=>urlencode($_POST["postcode_to"]),						//moving to post code 
					'to_city'=>urlencode($_POST["city_to"]),							//moving to city
					'to_address_line1'=>urlencode($_POST["houseno_to"]),		//moving to house no or address line1
					'to_address_line2'=>urlencode($_POST["address_to"]),		//moving to address line 2
					'to_property_type' => urlencode($property_type_to),		//possible values: House,Appartment/Flat,Bungalow
					'to_floor' => urlencode($_POST["floor_to"]),	
					'to_lift_available' => urlencode($lift_available_to),			//possible values: Yes/No
					
					'storage_service'=>$storage,
					'assembly_service'=>$asembly,
					'packing_service'=>$packing,
					
					'moving_date'=>urlencode($_POST["date"]),							//approx moving date
					'special_instructions'=>urlencode($_POST["additional_info"]),						//additional info or instructions
					'ip'=>$_SERVER['REMOTE_ADDR']								//customer's IP address
						
			);
		}
		elseif ($ri_form_type==1)
		{
			$form = 37;	//International removals

			$fields = array(
					'firstName'=>urlencode($firstName),							// *required field
					'lastName'=>urlencode($lastName),
					'email'=>urlencode($_POST["email"]),						// *required field
					'phone'=>urlencode($_POST["phone"]),						// *required field
					'altPhone'=>urlencode($altphone),
					'addressLine1'=>urlencode($_POST["houseno"]),				//moving from house no or address line 1
					'addressLine2'=>urlencode($_POST["address"]),				//moving from address line2
					'city'=>urlencode($_POST["city"]),							//moving from city
					'postCode'=>urlencode($_POST["postcode"]),					//moving from post code. *required field
					'country'=>urlencode($country_from),					//moving from country

					'from_property_type' => urlencode($property_type_from),		//possible values: House,Appartment/Flat,Bungalow
					'from_floor'=> urlencode($_POST["floor_from"]),			
					'from_lift_available' => urlencode($lift_available_from),	//possible values: Yes/No
					'from_bedrooms' => urlencode($_POST["bedrooms"]),		//from bedrooms
					
					'to_address_line1'=>urlencode($_POST["address_to"]),			//moving to house no or address line1
					'to_address_line2'=>urlencode($_POST["address_to"]),		//moving to address line 2
					'to_city'=>urlencode($_POST["city_to"]),							//moving to city
					'to_postcode'=>urlencode($_POST["postcode_to"]),						//moving to post code 
					'to_country'=>urlencode($_POST["countryTo"]),						//moving to country
					
					
					'to_property_type' => urlencode($property_type_to),			//possible values: House,Appartment/Flat,Bungalow
					'to_floor' => urlencode($_POST["floor_to"]),	
					'to_lift_available' => urlencode($lift_available_to),			//possible values: Yes/No

					'moving_date'=>urlencode($_POST["date"]),							//approx moving date
					'storage_service'=>$storage,
					'packing_service'=>$packing,
					'assembly_service'=>$asembly,
					
					'preferred_shipping_method' => urlencode($_POST['shipping_method']),	//preferred shipping method

					'special_instructions' => urlencode($_POST["additional_info"]),						//additional info or instructions				
					'ip'=>$_SERVER['REMOTE_ADDR']								//customer's IP address
						
			);
		}
		elseif ($ri_form_type==2)
		{
			$form = 36; //Business removals

			$fields = array(

					'companyName'=>urlencode($_POST["companyname"]),			// company name
					'firstName'=>urlencode($firstName),							// *required field
					'lastName'=>urlencode($lastName),
					'phone'=>urlencode($_POST["phone"]),						// *required field
					'altPhone'=>urlencode($altphone),
					'email'=>urlencode($_POST["email"]),						// *required field

					'addressLine1'=>urlencode($_POST["houseno"]),				//moving from house no or address line 1
					'addressLine2'=>urlencode($_POST["address"]),				//moving from address line2
					'city'=>urlencode($_POST["city"]),							//moving from city
					'postCode'=>urlencode($_POST["postcode"]),					//moving from post code. *required field

					'personnel_moved'=>urlencode($_POST["number_personnel"]),	//number of personnel moved
					'parking_available[]'=>urlencode($parking_available_from),	 //possible values: Yes/No
					'parking_issues'=>urlencode($_POST["parking_issues_from"]),
					'floor_area'=>urlencode($_POST["approx_floor_area"]),			
					'from_floor'=>urlencode($_POST["floor_from"]),			
					'lift_available[]' => urlencode($lift_available_from),	//possible values: Yes/No
					'to_address_line1'=>urlencode($_POST["houseno_to"]),						//moving to house no or address line1
					'to_address_line2'=>urlencode($_POST["address_to"]),			//moving to address line 2
					'to_city'=>urlencode($_POST["city_to"]),						//moving to city
					'to_postcode'=>urlencode($_POST["postcode_to"]),						//moving to post code 				
					'to_floor' => urlencode($_POST["floor_to"]),	
					'to_lift_available' => urlencode($lift_available_to),			//possible values: Yes/No
					'to_parking_available'=>urlencode($parking_available_to),	 //possible values: Yes/No
					'to_parking_issues'=>urlencode($_POST["parking_issues_to"]),	 //possible values: Yes/No
					'storage_service'=>$storage,
					'packing_service'=>$packing,
					'assembly_service'=>$asembly,
					'out_of_buisness_hours_removal[]'=>$out_of_business,
					
					'moving_date'=>urlencode($_POST["date"]),							//approx moving date
					'special_instructions' => urlencode($_POST["additional_info"]),				//additional info or instructions
					'ip'=>$_SERVER['REMOTE_ADDR']								//customer's IP address
						
			);
		}	
		
		
			
		
				
		//READY TO SUBMIT THE DATA. WE USE CURL TO CALL THE API
		
		if(isset($form))
		{	
			
			
			//Getting api_url ( settings>>RI Quote Form ) and api key, both from admin panel
			 $url = $api_url . '' . $form . '/' . $apiKey;
						
		    //url-ify the data for the POST
		    $fields_string = '';
		    foreach($fields as $key=>$value) {
		        $fields_string .= $key.'='.$value.'&';
		    }
		    rtrim($fields_string,'&');
		    
		    
		    
		   
		    //open connection
		    $ch = curl_init();
		    
		    //set the url, number of POST vars, POST data
		    curl_setopt($ch,CURLOPT_URL,$url);		
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch,CURLOPT_POST,count($fields));
		    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		    
		    //execute post
		    $result = curl_exec($ch);
		    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		    //close connection
		    curl_close($ch);
		    
		    
		    $obj = json_decode($result);
		   			
		    if ($http_code == 201) 	//ALL LOOKS GOOD, LEAD SUBMITED. REDIRECT TO YOUR THANKS PAGE
		    {
		    		

		    		header("Location: " . get_permalink($ri_thanks_page_id) . "?form=" . $form . "&h=" . $obj->hash);
		    		exit();

		    }
		    elseif ($http_code == 406) //ERRORS DETECTED BY PINLOCAL SYSTEM IN DATA
		    {
		    	echo "Following errors occured:";
		    	echo "<ul>";
		    	foreach($obj as $val)
		    	{
		    		echo "<li>$val</li>";
		    	}
		    	echo "</ul>";
			}
			else //SOMETHING ELSE HAPPENED, JUST OUTPUT THE RESPONSE OR HANDLE IT YOUR OWN WAY.
		    {
		    	echo $result;
		   	}
		    
		   	die();
		}
	} 
	    
}
?>