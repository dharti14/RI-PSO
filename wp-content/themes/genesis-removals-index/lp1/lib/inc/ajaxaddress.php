<?php
$text = '1 GREENWOOD DRIVE';
$text1 = preg_replace('/\d/','',$text);
//echo $text1;

define ('CRAFTY_KEY',	'b6e12-06b5f-e1c4d-00fca');
define ('CRAFTY_URL',	'http://pcls1.craftyclicks.co.uk/xml/rapidaddress');

$postcode = '';
$postcode_to = '';

if(isset($_REQUEST["postcode_from"])){
	
	$postcode = $_REQUEST["postcode_from"];
}

if(isset($_REQUEST["postcode_to"])){
	
	$postcode_to = $_REQUEST["postcode_to"];
}

// try 2 response styles
$response_style = 'data_formatted';
//$response_style = 'paf_compact';

$url = CRAFTY_URL.'?key='.CRAFTY_KEY.'&postcode='.$postcode.'&response='.$response_style;

$url_to = CRAFTY_URL.'?key='.CRAFTY_KEY.'&postcode='.$postcode_to.'&response='.$response_style;

if ($response_style == 'data_formatted') {
	// optional, default is 2, sets number of address lines
	$url.='&lines=3';
	$url_to.='&lines=3';
}

$xml_data = simplexml_load_file ($url);
$xml_data_to = simplexml_load_file ($url_to);

if ($response_style == 'data_formatted') {
	print_xml_data_formatted($xml_data, $xml_data_to);
}

die(0);

function print_xml_data_formatted($xml_data, $xml_data_to) {
	$result = $xml_data->address_data_formatted;
	$result_to = $xml_data_to->address_data_formatted;
	
	if($result){
		$line_1 = preg_replace('/\d/','', $result->delivery_point->line_1);
		$output_array_from = array(
              'town' => $result->town,
              'postal_county' => $result->postal_county,
              'traditional_county' => $result->traditional_county,
			  'postcode' => $result->postcode,
			  'department_name' => $result->delivery_point->department_name,
              'organisation_name' => $result->delivery_point->organisation_name,
              'line_1' => $line_1
          );
		  
	}else{
		$output_array_from = array(
              'town' => '',
              'postal_county' => '',
              'traditional_county' => '',
			  'postcode' => '',
			  'department_name' => '',
              'organisation_name' => '',
              'line_1' => '',
          );
	}
	if($result_to){
		$line_1_to = preg_replace('/\d/', '', $result_to->delivery_point->line_1);
		$output_array_to = array(
			  'town_to' => $result_to->town,
              'postal_county_to' => $result_to->postal_county,
              'traditional_county_to' => $result_to->traditional_county,
			  'postcode_to' => $result_to->postcode,
			  'department_name_to' => $result_to->delivery_point->department_name,
              'organisation_name_to' => $result_to->delivery_point->organisation_name,
              'line_1_to' => $line_1_to 
			 );
	}else{
		$output_array_to = array(
			  'town_to' => '',
              'postal_county_to' => '',
              'traditional_county_to' => '',
			  'postcode_to' => '',
			  'department_name_to' => '',
              'organisation_name_to' => '',
              'line_1_to' => ''
          );
	}
	$output_array = array_merge($output_array_from,$output_array_to);
	echo json_encode($output_array);
}

?>