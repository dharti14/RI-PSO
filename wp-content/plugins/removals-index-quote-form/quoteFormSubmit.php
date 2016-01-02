<?php

$api_url = $this->apiUrl;

//$api_key = $this->apiKey;

/**

Set the API keys based on the source of the lead.

**/

//remove query string parameters..
if(strpos($_SERVER['REQUEST_URI'],"?")!==false)
{
	$tmp = explode("?",$_SERVER['REQUEST_URI']);
	$clean_uri = $tmp[0];
}
else
{
	$clean_uri = $_SERVER['REQUEST_URI'];
}


//compare with URI to set appropriate API keys
if($clean_uri ==  "/ci/3/")
{
	$api_key = "eebc215b08728621c4c92121869d991f";
}
elseif($clean_uri ==  "/ci/1/")
{
	$api_key = "96e09e23013fbe58dd681f784c22cba8";
}
elseif($clean_uri == "/ci/2/") 
{
	$api_key = "";
}
elseif( $clean_uri ==  "/ci/phone/")
{
	$api_key = "0c9a40fd6bc59584defd3463ba0d7d9b";
}
elseif( $clean_uri == "/")
{
	$api_key = "a9082bb98f81426778733c51a2afb7ea";
}
else
{
	$api_key = "";	
}



if($api_key == '')
{

	echo "<pre>";
	echo "Key not specified";
	echo "</pre>";
	die();
}


$formId = '';
$url = '';
$firstName = '';
$lastName = '';
$fields_string = '';
$formType = '';

if( isset($_POST['form_type']) && ( $_POST['form_type'] == "design2" || $_POST['form_type'] == "design3" ) )
{
	//first name and last name given separate in form
	$firstName = trim($_POST["full_name"]);
	$lastName = trim($_POST["surname"]);
	
}
else
{
	//Split full name to first name and last name.
	$fullName = explode(" ", $_POST["full_name"]);
	$firstName = array_shift($fullName);
	$lastName = implode(" ", $fullName);
}

/*
 * Set all required fields based on quote type.
 */
if (trim($_POST['quotetype']) == 'salePurchase') {
	
	$formId = 5;

    $url = $api_url . 'api/lead/create/' . $formId . '/' . $api_key;

    $fields = array(
        'f1[]' => urlencode('Sale and Purchase'),
        'postCode' => urlencode($_POST["sale_property_postcode"]),
        'purchase_property_price' => urlencode($_POST["purchase_property_price"]),
        'instruct_time' => urlencode($_POST["looking_to_instruct"]),
        'special_instructions' => urlencode($_POST["special_instructions"]),
        'firstName' => urlencode($firstName),
        'lastName' => urlencode($lastName),
        'phone' => urlencode($_POST["phone_number"]),
        'email' => urlencode($_POST["email_address"]),
        'altPhone' => urlencode($_POST["alt_phone_number"]),
        'obtain_mortgage[]' => urlencode($_POST["mortgage"]),
        'first_time_buyer[]' => urlencode($_POST["first_time_buyer"]),
        'purchase_property_hold_status' => urlencode($_POST["purchase_property_holdstatus"]),
        'purchase_postcode' => urlencode($_POST["purchase_property_postcode"]),
        'sale_property_price' => urlencode($_POST["sale_property_price"]),
        'sale_property_hold_status' => urlencode($_POST["sale_property_holdstatus"]),
        'ip' => $_SERVER['REMOTE_ADDR'],
    );
} else if (trim($_POST['quotetype']) == 'sale') {
    $formId = 7;

    $url = $api_url . 'api/lead/create/' . $formId . '/' . $api_key;

    $fields = array(
        'f2[]' => urlencode('Sale only'),
        'sale_property_price' => urlencode($_POST["sale_property_price"]),
        'sale_property_hold_status' => urlencode($_POST["sale_property_holdstatus"]),
        'instruct_time' => urlencode($_POST["looking_to_instruct"]),
        'special_instructions' => urlencode($_POST["special_instructions"]),
        'firstName' => urlencode($firstName),
        'lastName' => urlencode($lastName),
        'postCode' => urlencode($_POST["sale_property_postcode"]),
        'phone' => urlencode($_POST["phone_number"]),
        'email' => urlencode($_POST["email_address"]),
        'altPhone' => urlencode($_POST["alt_phone_number"]),
        'ip' => $_SERVER['REMOTE_ADDR'],
    );
} else if (trim($_POST['quotetype']) == 'purchase') {
    $formId = 31;

    $url = $api_url . 'api/lead/create/' . $formId . '/' . $api_key;

    $fields = array(
        'f3[]' => urlencode('Purchase Only'),
        'purchase_property_price' => urlencode($_POST["purchase_property_price"]),
        'purchase_property_hold_status' => urlencode($_POST["purchase_property_holdstatus"]),
        'obtain_mortgage' => urlencode($_POST["mortgage"]),
        'first_time_buyer' => urlencode($_POST["first_time_buyer"]),
        'instruct_time' => urlencode($_POST["looking_to_instruct"]),
        'special_instructions' => urlencode($_POST["special_instructions"]),
        'firstName' => urlencode($firstName),
        'lastName' => urlencode($lastName),
        'postCode' => urlencode($_POST["purchase_property_postcode"]),
        'phone' => urlencode($_POST["phone_number"]),
        'email' => urlencode($_POST["email_address"]),
        'altPhone' => urlencode($_POST["alt_phone_number"]),
        'ip' => $_SERVER['REMOTE_ADDR'],
    );
} else if (trim($_POST['quotetype']) == 'remortgage') {
    $formId = 32;

    $url = $api_url . 'api/lead/create/' . $formId . '/' . $api_key;

    $fields = array(
        'f6[]' => urlencode('Remortgage'),
        'remortgage_property_price' => urlencode($_POST["remortgage_property_price"]),
        'remortgage_property_hold_status' => urlencode($_POST["remortgage_property_holdstatus"]),
        'instruct_time' => urlencode($_POST["looking_to_instruct"]),
        'special_instructions' => urlencode($_POST["special_instructions"]),
        'firstName' => urlencode($firstName),
        'lastName' => urlencode($lastName),
        'postCode' => urlencode($_POST["remortgage_property_postcode"]),
        'phone' => urlencode($_POST["phone_number"]),
        'email' => urlencode($_POST["email_address"]),
        'altPhone' => urlencode($_POST["alt_phone_number"]),
        'ip' => $_SERVER['REMOTE_ADDR']
    );
}
/*
 * initialize curl_init to submit quote form.
 */
foreach ($fields as $key => $value) {
    $fields_string .= $key . '=' . $value . '&';
}

$fields_string = rtrim($fields_string, '&');

//initialize curl_init.
$ch = curl_init();

//set the url, number of POST vars, POST data.
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

//execute curl and submit form.
$result = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//close connection.
curl_close($ch);

//Get result.
$obj = json_decode($result);

if ($http_code == 201) {
	
	if($formType == "design1"){
		$page = get_page_by_title('thank-you1');
		header("Location: " . get_page_link($page->ID) . "?form=" . $formId . "&h=" . $obj->hash);
	}
	elseif ($formType == "design2"){
		$page = get_page_by_title('thank-you2');
		header("Location: " . get_page_link($page->ID) . "?form=" . $formId . "&h=" . $obj->hash);
	}

    die();
} else if ($http_code == 406) {

    echo "Following errors occured:";
    echo "<ul>";
    foreach ($obj as $val) {
        echo "<li>$val</li>";
    }
    echo "</ul>";
} else {

    echo $result;
}
?>