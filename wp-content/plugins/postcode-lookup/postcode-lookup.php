<?php
	$options=get_option( 'postcode_lookup_array' );
	$postcode_lookup_url= $options['postcode_lookup_url_value'];
	$postcode_lookup_api = $options['postcode_lookup_key_value'];
	?>
	<input type="hidden" name="url" id="postcode_lookup_url" value="<?php echo $postcode_lookup_url; ?>">
	<input type="hidden" name="url" id="postcode_lookup_api" value="<?php echo $postcode_lookup_api; ?>">
	
	<?php 
		/* $input_var = "stock";
		$initUrl = $postcode_lookup_url.$input_var."/".$postcode_lookup_api;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $initUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$content = trim(curl_exec($ch));
		//echo $content;die();
		curl_close($ch); */
?>