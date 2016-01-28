<?php
ob_start();

if ($_POST) 
{

	$apiKey ='';
	
	$referrer = $_SERVER['HTTP_REFERER'];
	
			
	//----------------------------------------------------------------------------
	//check the source of form submission. /ri/phone 
	//is to be treated separate source and hence separate apiKey
	//Same for mobile.
	//----------------------------------------------------------------------------
	

	if(isset($_GET['ver']) && $_GET['ver'] == 'mobile')	//source mobile /ri/mobile folder
	{
		$apiKey = '715daa9efc6dbe33f19247f8ea6f82b2';
	}
	else if(isset($_GET['ver']) && $_GET['ver'] == 'fb')	//source facebook /ri/fb folder
	{
		$apiKey = '484590a911cc40d4b121dcf01fa2a044';
	}
	else
	{
		$pos = strpos($referrer,'/phone');
		
		if( $pos === FALSE)
		{
		
			$apiKey = '0acc26782cf67d425ab0476c0e948db3';
		
		}
		else
		{
			$apiKey = '34dc14b6f06a10f5b3b9c5dec48f4c3a';
		}
	}
		
	
	$formType = "";
	if(isset($_POST['form-type']))
	{
		$formType = $_POST['form-type'];
	
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
		
		if($formType==0)
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
					'f16'=>urlencode($_POST["bedrooms"]),						// *required field
					
					'f18'=>urlencode($_POST["postcode_to"]),						//moving to post code 
					'f19'=>urlencode($_POST["city_to"]),							//moving to city
					'to_address_line1'=>urlencode($_POST["houseno_to"]),		//moving to house no or address line1
					'to_address_line2'=>urlencode($_POST["address_to"]),		//moving to address line 2
					'to_property_type' => urlencode($property_type_to),		//possible values: House,Appartment/Flat,Bungalow
					'to_floor' => urlencode($_POST["floor_to"]),	
					'to_lift_available' => urlencode($lift_available_to),			//possible values: Yes/No
					
					'f23[]'=>$storage,
					'f24[]'=>$asembly,
					'f25[]'=>$packing,
					
					'f28'=>urlencode($_POST["date"]),							//approx moving date
					'f27'=>urlencode($_POST["additional_info"]),						//additional info or instructions
					'ip'=>$_SERVER['REMOTE_ADDR']								//customer's IP address
						
			);
		}
		elseif ($formType==1)
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
					'f9'=>urlencode($_POST["city_to"]),							//moving to city
					'f10'=>urlencode($_POST["postcode_to"]),						//moving to post code 
					'f11'=>urlencode($_POST["countryTo"]),						//moving to country
					
					
					'to_property_type' => urlencode($property_type_to),			//possible values: House,Appartment/Flat,Bungalow
					'to_floor' => urlencode($_POST["floor_to"]),	
					'to_lift_available' => urlencode($lift_available_to),			//possible values: Yes/No

					'f13'=>urlencode($_POST["date"]),							//approx moving date
					'f14[]'=>$storage,
					'f15[]'=>$packing,
					'f16[]'=>$asembly,
					
					'preferred_shipping_method' => urlencode($_POST['shipping_method']),	//preferred shipping method

					'f17' => urlencode($_POST["additional_info"]),						//additional info or instructions				
					'ip'=>$_SERVER['REMOTE_ADDR']								//customer's IP address
						
			);
		}
		elseif ($formType==2)
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
					'f4'=>urlencode($_POST["houseno_to"]),						//moving to house no or address line1
					'address_line_2 '=>urlencode($_POST["address_to"]),			//moving to address line 2
					'to_city'=>urlencode($_POST["city_to"]),						//moving to city
					'f19'=>urlencode($_POST["postcode_to"]),						//moving to post code 				
					'floor_to' => urlencode($_POST["floor_to"]),	
					'lift_available_to[]' => urlencode($lift_available_to),			//possible values: Yes/No
					'parking_available_to[]'=>urlencode($parking_available_to),	 //possible values: Yes/No
					'parking_issues_to'=>urlencode($_POST["parking_issues_to"]),	 //possible values: Yes/No
					'f14[]'=>$storage,
					'f15[]'=>$packing,
					'f16[]'=>$asembly,
					'out_of_buisness_hours_removal[]'=>$out_of_business,
					
					'f18'=>urlencode($_POST["date"]),							//approx moving date
					'f17' => urlencode($_POST["additional_info"]),				//additional info or instructions
					'ip'=>$_SERVER['REMOTE_ADDR']								//customer's IP address
						
			);
		}	
		
// 		echo "<pre>";print_r($fields);
// 		die();

		//READY TO SUBMIT THE DATA. WE USE CURL TO CALL THE API
		
		if(isset($form))
		{	
			
			//For Live Use
			$url = 'http://www.pinlocal.com/api/lead/create/'.$form.'/'. $apiKey;	//PLEASE REQUEST THE API KEY FROM PINLOCAL
			
			// $url = $api_url . 'api/lead/create/' . $formId . '/' . $api_key;
			
			//For Testing Use 
			//$url = 'http://pinlocal5.ui.rollingcodes.io/api/lead/create/'.$form.'/'. $apiKey;
			
			
			/* print_r($fields);
			die(); */
			
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
		    	//please provide the page title/id of thank you page which you want to redirect (in our case its id=40)
		    	//get_permalink(40);
				header("Location: " . get_permalink(get_page_by_title('Current Removals Index Thanks')) . "?form=" . $form . "&h=" . $obj->hash);
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