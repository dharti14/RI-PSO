<?php

// ******************Creating Meta Box for Landing Page Settings********************************** //

//Create metabox for landing page settings
function create_metabox_for_landing_page_settings(){
	add_meta_box('landing_page_metabox','Landing Page Settings','create_html_for_landing_page_settings','page','normal','high');
}

add_action('add_meta_boxes','create_metabox_for_landing_page_settings');

//Creating HTML Structure for Landing Page Setings Meta Box
function create_html_for_landing_page_settings(){

	//wp_nonce_field( $action, $name, $referer, $echo )
	//All are optional parameters
	//Action name==>give the context to what is taking place
	//Nonce name==>access nonce via  $_POST[$name].

	wp_nonce_field( 'creating_nonce_for_landing_page_settings', 'landing_page_settings_nonce' );

	?>
	<table>
	
		<tr>
			<td>
				<label for="is_page_dki">Enable DKI</label>
			</td>
			<td>
				<select name="landing_page_settings[_is_page_dki]" id="_is_page_dki">
	            
	            <option value="no" <?php selected ( genesis_get_custom_field( '_is_page_dki' ), 'no' ); ?>>No</option>
	            <option value="yes" <?php selected ( genesis_get_custom_field( '_is_page_dki' ), 'yes' ); ?>>Yes</option>
	            
	        	</select>
	        </td>
		</tr>
		
		<tr>
			<td>
				<label for="conversion_page">Conversion Page</label>
			</td>
			<td><?php 	
				
			$args = array(
			
					'meta_key'         => '_is_conversion_page',
					'meta_value'       => 'yes',
					'post_type'        => 'page'
			);
			
			$results = get_posts($args);
			
			?>
				<select name="landing_page_settings[_conversion_page]" id="_conversion_page">
					<option value="">Please Select Conversion Page</option>
				<?php 
				foreach ( $results as $post ){
					?><option value="<?php echo $post->ID;?>"  <?php selected ( genesis_get_custom_field( '_conversion_page' ), $post->ID ); ?>  ><?php echo $post->post_title; ?></option>
				<?php }
				
				?>
	           		            
	        	</select>
	        </td>
		</tr>
		
		
		<tr>
			<td>
				<label for="pinlocal_source_key">Pinlocal Source Key</label>
			</td>
			<td>	            
	           <input type="text" name="landing_page_settings[_pinlocal_source_key]" style="width: 400px;height: 40px;" id="_pinlocal_source_key" value="<?php echo esc_attr( genesis_get_custom_field( '_pinlocal_source_key' ) );  ?>">
	        </td>
		</tr>
	
	</table>
	
	<?php 
	
}


//Saving the value of fields of landing page settings meta box
add_action( 'save_post', 'save_landing_page_settings_value' );
function save_landing_page_settings_value() {

	if ( ! isset( $_POST['landing_page_settings'] ) )
		return;

	$field_names = wp_parse_args( $_POST['landing_page_settings'], array(
				
			'_is_page_dki'          => '',
			'_conversion_page'   	=> '',
			'_pinlocal_source_key'  =>'',
				
	) );


	//Please see genesis/lib/functions/options.php for more info. about genesis_save_custom_fields
	genesis_save_custom_fields( $field_names, 'creating_nonce_for_landing_page_settings', 'landing_page_settings_nonce', $post );


}


// ******************Creating Meta Box for Landing Page Settings********************************** //




// ******************Creating Meta Box for Conversion Page Settings********************************** //


//Create metabox for conversion page settings
function create_metabox_for_conversion_page_settings() {

	add_meta_box( 'conversion_page_settings_meta_box', 'Conversion Page Settings', 'create_html_for_conversion_page_settings_metabox', 'page', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'create_metabox_for_conversion_page_settings' );


//Creating HTML Structure for Conversion Page Setings Meta Box 
function create_html_for_conversion_page_settings_metabox() {
    
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'creating_nonce_for_conversion_page_settings', 'conversion_page_settings_nonce' );
	   
	?>

	<table>
		
	<tr>
		<td>
			<label for="is_conversion_page">Is Conversion Page ?</label>
		</td>
		<td>
			<select name="conversion_page_settings[_is_conversion_page]" id="_is_conversion_page">
            
            <option value="no" <?php selected ( genesis_get_custom_field( '_is_conversion_page' ), 'no' ); ?>>No</option>
            <option value="yes" <?php selected ( genesis_get_custom_field( '_is_conversion_page' ), 'yes' ); ?>>Yes</option>
            
        </select>
        </td>
	</tr>
	    
    <tr>
	    <td>
	    	<label for="conversion_script">Conversion Scripts</label>
	    </td>
	    <td>   	
	    	<textarea placeholder="Please provide conversion code here" name="conversion_page_settings[_conversion_script]" id="_tracking_code" rows="12" cols="80"><?php echo esc_textarea( genesis_get_custom_field( '_conversion_script' ) );  ?></textarea>
	    </td>
    </tr>
    
    </table>
    <?php   
}


//Saving the value of fields of page settings meta box
add_action( 'save_post', 'save_conversion_page_settings_value' );
function save_conversion_page_settings_value() {
	
	if ( ! isset( $_POST['conversion_page_settings'] ) )
		return;
	
	$field_names = wp_parse_args( $_POST['conversion_page_settings'], array(
			
			'_is_conversion_page'   => '',
			'_conversion_script'        => '',
			
	) );
	

	//Please see genesis/lib/functions/options.php for more info. about genesis_save_custom_fields
	genesis_save_custom_fields( $field_names, 'creating_nonce_for_conversion_page_settings', 'conversion_page_settings_nonce', $post );
	
	 
}

// ******************Creating Meta Box for Conversion Page Settings********************************** //


// ****************** Creating Meta Box for SILO page settings ********************************** //




//Create metabox for silo page settings
function create_metabox_for_silo_page_settings() {

	add_meta_box( 'banner_alt_text_meta_box', 'SILO Page Settings', 'create_html_for_silo_page_settings_metabox', 'page', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'create_metabox_for_silo_page_settings' );


//Creating HTML Structure for SILO Page Setings Meta Box
function create_html_for_silo_page_settings_metabox() {

	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'creating_nonce_for_silo_page_settings', 'silo_page_settings_nonce' );

	?>
	<div class="silo-page-settings">
	
		<p> <b>1. <u>Banner Image Settings</u></b></p>
		
			<table>	
			
				<tr>
					<td>
						<label for="banner_alt_text"> Image Alternate Text :&nbsp;&nbsp; </label>
					</td>
					<td>
						<input type="text" placeholder="Please provide the alternate text for the banner image" name="silo[_banner_img_alt_text]" style="width: 600px;height: 35px;" id="_banner_img_alt_text" value="<?php echo esc_attr( genesis_get_custom_field( '_banner_img_alt_text' ) );  ?>">
			        </td>
				</tr>
				
				<tr>
					<td></td>
					<td><em style="color: grey;">This will be the alt text of the banner image.</em></td>
				</tr>
			
				<tr style="height:10px;">
				</tr>
				
			</table>
		
		<hr>
		
		<p><b>2. <u>Schema Tag Settings for Title </u> </b></p>
		
		<p>**Please enter the required text in below input boxes to preview the exact H1 tag generated**</p>
	
		<p style="font-size:15px;"><b><?php echo htmlspecialchars('<h1 itemscope itemtype="http://schema.org/Article"> <span itemprop="articleSection"> ')?><span style="color:#378000;" id="schema_text"></span><?php echo htmlspecialchars(' </span> ')?><span style="color:#0073aa;" id="header_text"></span> <?php echo htmlspecialchars(' </span></h1>')?></b></p>
		<table>
		
			<tr style="height:5px;">
			</tr>
			
			<tr>
				<td>
					<label for="schema_header_text"> Title text (inside "articleSection")  :&nbsp;&nbsp; </label>
				</td>
				<td>
					<input type="text" placeholder="Please provide the title need to be placed in schema tag" name="silo[_schema_header_text]" style="width: 600px;height: 35px;" id="_schema_header_text" value="<?php echo esc_attr( genesis_get_custom_field( '_schema_header_text' ) );  ?>">
		        </td>
			</tr>
						
			<tr style="height:10px;">
			</tr>
			
			<tr>
				<td>
					<label for="header_text">  Remaining Title text  :&nbsp;&nbsp; </label>
				</td>
				<td>
					<input type="text" placeholder="Please provide the title need to be placed outside schema tag" name="silo[_header_text]" style="width: 600px;height: 35px;" id="_header_text" value="<?php echo esc_attr( genesis_get_custom_field( '_header_text' ) );  ?>">
		        </td>
			</tr>
					
		</table>
	</div>
    <?php   
}


//Saving the value of fields of page settings meta box
add_action( 'save_post', 'save_silo_page_settings' );
function save_silo_page_settings() {
	
	if ( ! isset( $_POST['silo'] ) )
		return;
	
	$field_names = wp_parse_args( $_POST['silo'], array(
			
			'_banner_img_alt_text'   => '',
			'_schema_header_text' 	 => '',
			'_header_text' 			 => ''
			
	) );
	

	//Please see genesis/lib/functions/options.php for more info. about genesis_save_custom_fields
	genesis_save_custom_fields( $field_names, 'creating_nonce_for_silo_page_settings', 'silo_page_settings_nonce', $post );
	
	 
}

