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
